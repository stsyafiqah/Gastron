//var wrapper = document.getElementById("signature-pad");
//var clearButton = wrapper.querySelector("[data-action=clear]");

var wrapper1 = document.getElementById("signature-pad"),
clearButton1 = wrapper1.querySelector("[data-action=clear]"),
canvas1 = wrapper1.querySelector("canvas"),
signaturePad1;

// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
function resizeCanvas(canvas) {
  // When zoomed out to less than 100%, for some very strange reason,
  // some browsers report devicePixelRatio as less than 1
  // and only part of the canvas is cleared then.
  var ratio =  Math.max(window.devicePixelRatio || 1, 1);

  // This part causes the canvas to be cleared
  canvas.width = canvas.offsetWidth * ratio;
  canvas.height = canvas.offsetHeight * ratio;
  canvas.getContext("2d").scale(ratio, ratio);

  // This library does not listen for canvas changes, so after the canvas is automatically
  // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
  // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
  // that the state of this library is consistent with visual state of the canvas, you
  // have to clear it manually.
  signaturePad1.clear();
}

signaturePad1 = new SignaturePad(canvas1);

// On mobile devices it might make more sense to listen to orientation change,
// rather than window resize events.
//window.onresize = resizeCanvas;
resizeCanvas(canvas1);


clearButton1.addEventListener("click", function (event) {
  signaturePad1.clear();
});







$( ".button-submit" ).click(function() {
if (signaturePad1.isEmpty()) {
console.log("Please draw signature");
} else {
$("#signature_image").html( signaturePad1.toDataURL() );
}
//    alert("ccccccccc"+ signaturePad1.toDataURL());
//    return false;
    $("#wizard-clickable").submit();
});
