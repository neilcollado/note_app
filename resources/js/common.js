
const App = {
	init() {
        $(document).on('submit','.appForm',App.submitAppForm);
        $(document).on('click','.deleteItem--btn',App.deleteItem);
        $(document).on('click','.addItem--btn',App.addItem);
        $(document).on('click','.deleteRequest--btn',App.deleteRequest);
        $(document).on('click','.deleteRequest--bulk',App.deleteRequestBulk);
        $(document).on('click','.todoCards input[type=checkbox]',App.handleCheckboxClick);
        $(document).on('click','.editRequest--bulk',App.handleBulkEditClick);
        $(document).on('click','.itemsContainer input[type=checkbox]',App.handleItemCheckboxClick);
        $(document).on('click','.removeSelected--btn',App.handleRemoveItemSelected);
	},
    //items
    deleteItem() {
        $(this).parent().parent().remove();
    },
    handleItemCheckboxClick() {
        let selectedData = [];
        $(".itemsContainer").find("input[type=checkbox]").each(function(){
            if($(this).is(':checked'))
            selectedData.push($(this).val());
        });
        if(!selectedData.length)
            $('.removeSelected--btn').hide();
        else
            $('.removeSelected--btn').show();
    },
    handleRemoveItemSelected(){
        $(".itemsContainer").find("input[type=checkbox]").each(function(){
            if($(this).is(':checked'))
                $(this).parent().parent().parent().remove();
        });
        $(this).hide();
    },

    addItem(){
        $('.itemsContainer').append(`
            <div class="input-group mb-1 item">
                <div class="md-form input-group mt-0 mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text md-addon">
                        <input class="form-check-input" type="checkbox" value="" id="chkbx" >
                        <label class="form-check-label" for="chkbx">
                        </label></div>
                    </div>
                    <input type="text" name="items[]" class="form-control form-control-sm" id="items">
                    <div class="input-group-append">
                        <button class="btn btn-secondary btn-sm deleteItem--btn"
                            type="button">Delete</button>
                    </div>
                </div>
            </div>
        `);
    },


    deleteRequestBulk(){
        let selectedData = [];
        let route = window.event.target.getAttribute('data-url');

        $(".todoCards").find("input[type=checkbox]").each(function(){
            if($(this).is(':checked'))
            selectedData.push($(this).val());
        });
        if(!selectedData.length){
            alert('Select atleast one card');
            return false;
        }
        if(!confirm('Do you really want to delete?')) return false;
        axios.post(route,{
            ids : selectedData
        }).then((response) => {
            location.reload();
        }).catch((error) => {
            console.error(error);
            alert("Error in deleting contact support");
        });
    },

    handleCheckboxClick() {
        let selectedData = [];
        $(".todoCards").find("input[type=checkbox]").each(function(){
            if($(this).is(':checked'))
            selectedData.push($(this).val());
        });
        if(!selectedData.length)
            $('.deleteRequest--bulk,.editRequest--bulk').hide();
        else
            $('.deleteRequest--bulk,.editRequest--bulk').show();
    },


    handleBulkEditClick(){
        let selectedData = [];
        let route = window.event.target.getAttribute('data-url');
        let modal = $('#editModal');

        $(".todoCards").find("input[type=checkbox]").each(function(){
            if($(this).is(':checked'))
            selectedData.push($(this).val());
        });
        if(!selectedData.length){
            alert('Select atleast one card');
            return false;
        }
        modal.modal();
        modal.find('.modal-body').html('Loading...');

        axios.post(route, {
          ids : selectedData
        }).then((response) => {
          modal.find('.modal-body').html(response.data)
        }).catch((error) => {
          console.error(error);
        }).finally(() => {
          
        });

    },

    //global functions
	loader() {
		return '<div class="text-center">  Loading..</div>';
    },

    submitAppForm() {
        window.event.preventDefault();
		let form = new FormData($('.appForm')[0]);
		let url  = $('.appForm').attr('action');
		let submitBtn = $('.appForm--submit');
		let responseBlock  = $('.appForm--response');
		responseBlock.html(`${App.loader()}`);
		submitBtn.prop('disabled',true);

		axios.post(url,form).then((response) => {
            responseBlock.html(`<div class="alert alert-success successResponse"> ${response.data.message}</div>`);
            if(response.data.url != undefined)
                window.location.href = response.data.url;
    		submitBtn.prop('disabled',false);
        }).catch((error,other) => {
			responseBlock.html('');
			submitBtn.prop('disabled',false);
            error.response.data.errors.map((err) => {
				responseBlock.append(`<div class="alert alert-danger">${err}</div>`) 
			})
        });
    },

    deleteRequest(){
        let route = window.event.target.getAttribute('data-url');
        let message = window.event.target.getAttribute('data-message')
        message = message == undefined ? 'Yes, delete it!': message;
        if(confirm(message)){
            axios.delete(route).then((response) => {
                location.reload();
            }).catch((error) => {
                console.error(error);
                alert("Error in deleting contact support");
            });
        }
    },
}
export default App;