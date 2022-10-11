//Side nav
const sidenav = document.getElementById('sidenav-1');
const instance = mdb.Sidenav.getInstance(sidenav);
let innerWidth = null;

const setMode = (e) => {
  // Check necessary for Android devices
  if (window.innerWidth === innerWidth) {
    return;
  }

  innerWidth = window.innerWidth;

  if (window.innerWidth < 660) {
    instance.changeMode('over');
    instance.hide();
  } else {
    instance.changeMode('side');
    instance.show();
  }
};
setMode();
// Event listeners
window.addEventListener('resize', setMode);

//Date Picker
const datepickerDisablePast = document.querySelector('.datepicker-disable-past');
new mdb.Datepicker(datepickerDisablePast, {
  disablePast: true,
  format: 'yyyy-mm-dd'
});
