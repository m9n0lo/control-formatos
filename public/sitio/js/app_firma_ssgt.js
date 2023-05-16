/*
		El siguiente codigo en JS Contiene mucho codigo
		de las siguietes 3 fuentes:
		https://stipaltamar.github.io/dibujoCanvas/
		https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
		http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
*/

(function () {
    // Comenzamos una funcion auto-ejecutable

    // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
    window.requestAnimFrame = (function (callback) {
        return (
            window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimaitonFrame ||
            function (callback) {
                window.setTimeout(callback, 1000 / 60);
                // Retrasa la ejecucion de la funcion para mejorar la experiencia
            }
        );
    })();

    // Traemos el canvas2 mediante el id del elemento html
    var canvas2 = document.getElementById("draw_canvas_sst2");
    var ctx = canvas2.getContext("2d");

    // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
    var drawText2 = document.getElementById("draw_dataUrl2");
    var drawImage2 = document.getElementById("draw_image2");
    var clearBtn2 = document.getElementById("draw_clearBtn_sst2");
    var submitBtn2 = document.getElementById("draw_submitBtn_sst2");
    var text_firma2 = document.getElementById("texto_firma2");
    var hr_f_r2 = document.getElementById("hr_f_r2");


    clearBtn2.addEventListener(
        "click",
        function (e) {
            // Definimos que pasa cuando el boton draw-clearBtn2 es pulsado
            clearCanvas();
            drawImage2.setAttribute("src", "");
        },
        false
    );
    // Definimos que pasa cuando el boton draw-submitBtn2 es pulsado
    submitBtn2.addEventListener(
        "click",
        function (e) {
            var dataUrl = canvas2.toDataURL();
            drawText2.innerHTML = dataUrl;
            drawImage2.setAttribute("src", dataUrl);
            $("#boton_f_r2").hide();
            drawImage2.removeAttribute('hidden');
            text_firma2.removeAttribute('hidden');
            hr_f_r2.removeAttribute('hidden');

            clearCanvas();
        },
        false
    );

    // Activamos MouseEvent para nuestra pagina
    var drawing = false;
    var mousePos = { x: 0, y: 0 };
    var lastPos = mousePos;
    canvas2.addEventListener(
        "mousedown",
        function (e) {
            /*
      Mas alla de solo llamar a una funcion, usamos function (e){...}
      para mas versatilidad cuando ocurre un evento
    */

            console.log(e);
            drawing = true;
            lastPos = getMousePos(canvas2, e);
        },
        false
    );
    canvas2.addEventListener(
        "mouseup",
        function (e) {
            drawing = false;
        },
        false
    );
    canvas2.addEventListener(
        "mousemove",
        function (e) {
            mousePos = getMousePos(canvas2, e);
        },
        false
    );

    // Activamos touchEvent para nuestra pagina
    canvas2.addEventListener(
        "touchstart",
        function (e) {
            mousePos = getTouchPos(canvas2, e);
            console.log(mousePos);
            e.preventDefault(); // Prevent scrolling when touching the canvas2
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY,
            });
            canvas2.dispatchEvent(mouseEvent);
        },
        false
    );
    canvas2.addEventListener(
        "touchend",
        function (e) {
            e.preventDefault(); // Prevent scrolling when touching the canvas2
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas2.dispatchEvent(mouseEvent);
        },
        false
    );
    canvas2.addEventListener(
        "touchleave",
        function (e) {
            // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas2
            e.preventDefault(); // Prevent scrolling when touching the canvas2
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas2.dispatchEvent(mouseEvent);
        },
        false
    );
    canvas2.addEventListener(
        "touchmove",
        function (e) {
            e.preventDefault(); // Prevent scrolling when touching the canvas2
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY,
            });
            canvas2.dispatchEvent(mouseEvent);
        },
        false
    );

    // Get the position of the mouse relative to the canvas2
    function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        /*
      Devuelve el tamaño de un elemento y su posición relativa respecto
      a la ventana de visualización (viewport).
    */
        return {
            x: mouseEvent.clientX - rect.left,
            y: mouseEvent.clientY - rect.top,
        };
    }

    // Get the position of a touch relative to the canvas2
    function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        console.log(touchEvent);
        /*
      Devuelve el tamaño de un elemento y su posición relativa respecto
      a la ventana de visualización (viewport).
    */
        return {
            x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
            y: touchEvent.touches[0].clientY - rect.top,
        };
    }

    // Draw to the canvas2
    function renderCanvas() {
        if (drawing) {
            ctx.beginPath();
            ctx.moveTo(lastPos.x, lastPos.y);
            ctx.lineTo(mousePos.x, mousePos.y);

            ctx.stroke();
            ctx.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        canvas2.width = canvas2.width;
    }

    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();
})();
