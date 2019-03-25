// our application constructor
function application() {
}

application.prototype.resizeFrame = function () {

    var currentSize = BX24.getScrollSize();
    minHeight = currentSize.scrollHeight;

    if (minHeight < 800)
        minHeight = 800;
    BX24.resizeWindow(this.FrameWidth, minHeight);

}

application.prototype.saveFrameWidth = function () {
    this.FrameWidth = document.getElementById("app").offsetWidth;
};

application.prototype.addCode = function () {    
    $('.ctext-area').val($('.ctext-area').val() + $('#fields').val());
    $('#modalFields').modal('hide')
}

app = new application();
