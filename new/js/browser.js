function getWidth() {
  return Math.max(
    document.body.scrollWidth,
    document.documentElement.scrollWidth,
    document.body.offsetWidth,
    document.documentElement.offsetWidth,
    document.documentElement.clientWidth
  );
}

function getHeight() {
  return Math.max(
    document.body.scrollHeight,
    document.documentElement.scrollHeight,
    document.body.offsetHeight,
    document.documentElement.offsetHeight,
    document.documentElement.clientHeight
  );
}

function changecss(){
    return Document.body(
        document.open('./new/css/style.css').write.documentElement("height") = "Height: " + getHeight + ";",
        document.close,
        document.open("./new/css/style.css").write.documentElement("width") = "Width: " + getWidth + ";",
        document.close
    );
}


//console.log('Width:  ' +  getWidth() );
//console.log('Height: ' + getHeight() );

