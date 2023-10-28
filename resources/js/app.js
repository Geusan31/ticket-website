import 'flowbite';
import './bootstrap';

document.getElementById('pesawat').addEventListener('click', function() {
  showForm('pesawat');
});

document.getElementById('keretaApi').addEventListener('click', function() {
  showForm('keretaApi');
});

document.getElementById('pesawatNav').addEventListener('click', function() {
  showForm('pesawat');
});

document.getElementById('keretaApiNav').addEventListener('click', function() {
  showForm('keretaApi');
});

document.getElementById('pesawatFoot').addEventListener('click', function() {
  showForm('pesawat');
});

document.getElementById('keretaApiFoot').addEventListener('click', function() {
  showForm('keretaApi');
});


function showForm(form) {
  var formPesawat = document.getElementById('formPesawat');
  var formKeretaApi = document.getElementById('formKeretaApi');
  if (form == 'pesawat') {
      formPesawat.classList.remove('hidden');
      formKeretaApi.classList.add('hidden');
  } else if (form == 'keretaApi') {
      formPesawat.classList.add('hidden');
      formKeretaApi.classList.remove('hidden');
  }
}