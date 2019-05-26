var input =    document.getElementById('inputPort');
var preview =  document.getElementById('showPort');
var inputProf =   document.getElementById('inputProf');
var previewProf = document.getElementById('showProf');
if(preview != null){
  preview.style.opacity = 0;
}
if(input != null){
  input.addEventListener('change', updateImageDisplayone);
}
if(previewProf != null){
  preview.style.opacity = 0;
}
if(inputProf != null){
  inputProf.addEventListener('change', updateImageDisplayTwo);
}
function updateImageDisplayone() {
  while(preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }

  var curFiles = input.files;
  if(curFiles.length === 0) {
    var para = document.createElement('p');
    para.textContent = 'No hay archivos seleccionados';
    preview.appendChild(para);
  } else {
    var list = document.createElement('ul');
    preview.appendChild(list);
    for(var i = 0; i < curFiles.length; i++) {
      var listItem = document.createElement('li');
      var para = document.createElement('p');
      if(validFileType(curFiles[i])) {
        para.textContent = 'Nombre del archivo ' + curFiles[i].name + ', Tamaño ' + returnFileSize(curFiles[i].size) + '.';
        var image = document.createElement('img');
        image.src = window.URL.createObjectURL(curFiles[i]);

        listItem.appendChild(image);
        listItem.appendChild(para);

      } else {
        para.textContent = 'Nombre del archivo ' + curFiles[i].name + ': No es de un tipo valido. Cambia tu selección.';
        listItem.appendChild(para);
      }

      list.appendChild(listItem);
    }
    preview.style.opacity = 1;
  }
}

function updateImageDisplayTwo() {
  while(previewProf.firstChild) {
    previewProf.removeChild(previewProf.firstChild);
  }

  var curFiles = inputProf.files;
  if(curFiles.length === 0) {
    var para = document.createElement('p');
    para.textContent = 'No hay archivos seleccionados';
    previewProf.appendChild(para);
  } else {
    var list = document.createElement('ul');
    previewProf.appendChild(list);
    for(var i = 0; i < curFiles.length; i++) {
      var listItem = document.createElement('li');
      var para = document.createElement('p');
      if(validFileType(curFiles[i])) {
        para.textContent = 'Nombre del archivo ' + curFiles[i].name + ', Tamaño ' + returnFileSize(curFiles[i].size) + '.';
        var image = document.createElement('img');
        image.src = window.URL.createObjectURL(curFiles[i]);

        listItem.appendChild(image);
        listItem.appendChild(para);

      } else {
        para.textContent = 'Nombre del archivo ' + curFiles[i].name + ': No es de un tipo valido. Cambia tu selección.';
        listItem.appendChild(para);
      }

      list.appendChild(listItem);
    }
    previewProf.style.opacity = 1;
  }
}
var fileTypes = [
  'image/jpeg',
  'image/pjpeg',
  'image/png'
]
function validFileType(file) {
  for(var i = 0; i < fileTypes.length; i++) {
    if(file.type === fileTypes[i]) {
      return true;
    }
  }
  return false;
}
function returnFileSize(number) {
  if(number < 1024) {
    return number + 'bytes';
  } else if(number >= 1024 && number < 1048576) {
    return (number/1024).toFixed(1) + 'KB';
  } else if(number >= 1048576) {
    return (number/1048576).toFixed(1) + 'MB';
  }
}

