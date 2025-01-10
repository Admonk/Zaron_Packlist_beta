<html>
   <head>
      <title>Page Title</title>
      <link href="style.css" rel="stylesheet">
      <style>
          .draggable {
            color: white;
            border-radius: 0.75em;
            touch-action: none;
            user-select: none;
            transform: translate(0px, 0px);
            font-size: 20px;
            position: absolute;
            color: #000;
            top: 10%;
          }
         html {
         --active: var(--primary);
         --bg: #333;
         --disabled: #666;
         --primary: #fff;
         --static: #888;
         font-family: sans-serif;
         font-size: 75%;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
         font-smoothing: antialiased;
         }
         canvas {
         display: block;
         touch-action: none;
         }
         fieldset > * {
         display: inline-block;
         vertical-align: middle;
         }
         legend {
         font-weight: bold;
         font-size: 1.5rem;
         }
         input[type=radio] {
         display: none;
         }
         input[type=color] {
         height: 0;
         position: absolute;
         top: -800px;
         width: 0;
         }
         .toolbar {
         color: var(--primary);
         display: flex;
         flex-wrap: wrap;
         left: 0;
         position: absolute;
         top: 0;
         width: 100%;
         display: none;
         }
         .toolbar__group {
         background-color: rgba(0, 0, 0, 0.85);
         flex-grow: 1;
         padding: 10px 15px 20px;
         }
         .toolbar__heading {
         margin-bottom: 0.5em;
         }
         .toolbar__option {
         margin-right: 1rem;
         }
         .toolbar__button {
         --dimension: 3rem;
         border: 1px solid currentColor;
         color: var(--static);
         cursor: pointer;
         display: inline-block;
         height: var(--dimension);
         line-height: 1;
         position: relative;
         overflow: hidden;
         text-indent: 60px;
         vertical-align: middle;
         width: var(--dimension);
         }
         .toolbar__button::before {
         background-color: currentColor;
         content: "";
         display: block;
         left: 50%;
         position: absolute;
         top: 50%;
         }
         .toolbar__option--color .toolbar__button {
         border: none;
         }
         .toolbar__button[for=line]::before {
         height: 70%;
         transform: translate(-50%, -50%) rotate(45deg);
         width: 2px;
         }
         .toolbar__button[for=rectangle]::before {
         height: 45%;
         transform: translate(-50%, -50%);
         width: 45%;
         }
         .toolbar__button[for=circle]::before {
         border-radius: 100%;
         height: 50%;
         transform: translate(-50%, -50%);
         width: 50%;
         }
         .toolbar__button[for=polygon]::before {
         background-color: transparent;
         border-bottom: 1.3rem solid currentColor;
         border-left: 0.75rem solid transparent;
         border-right: 0.75rem solid transparent;
         display: block;
         height: 0;
         transform: translate(-50%, -54%);
         width: 0;
         }
         input:checked + .toolbar__button {
         background-color: #777;
         color: var(--active);
         }
         .toolbar__label {
         margin-right: 0.5rem;
         }
         .toolbar__sub-group {
         margin-left: 1rem;
         opacity: 0.3;
         }
         input:checked + .toolbar__button + .toolbar__sub-group {
         opacity: 1;
         }
         #clear {
         position: absolute;
         right: 30px;
         top: 10px;
         }
         #saveServer
         {
         position: absolute;
         right: 100px;
         top: 10px;
         }
         body
         {
         margin: 0px !important;
         overflow: hidden;
         }
      </style>
      
   </head>
   <body>
      <ul class="toolbar">
         <li class="toolbar__group">
            <fieldset>
               <legend class="toolbar__heading">Tools</legend>
               <input id="line" type="radio" name="tools" value="line" checked="checked"/>
               <label class="toolbar__button" for="line"><span>Line</span></label>
               <div style="display: none;">
                  <input id="rectangle" type="radio" name="tools" value="rectangle"/>
                  <label class="toolbar__button" for="rectangle"><span>Rectangle</span></label>
                  <input id="circle" type="radio" name="tools" value="circle"/>
                  <label class="toolbar__button" for="circle"><span>Circle</span></label>
                  <input id="polygon" type="radio" name="tools" value="polygon"/>
                  <label class="toolbar__button" for="polygon"><span>Polygon</span></label>
                  <div class="toolbar__sub-group">
                     <label class="toolbar__label" for="sides">Polygon Sides:</label>
                     <input id="sides" type="number" min="3" max="10" value="3" data-setting="polygonSides"/>
                  </div>
               </div>
            </fieldset>
         </li>
         <li class="toolbar__group">
            <fieldset>
               <legend class="toolbar__heading">Options</legend>
               <div class="toolbar__option toolbar__option--color">
                  <label for="stroke-color"><span class="toolbar__label">Stroke</span><span class="toolbar__button"></span></label>
                  <input id="stroke-color" type="color" value="#ff5e14" data-setting="strokeColor"/>
               </div>
               <div class="toolbar__option toolbar__option--color">
                  <label for="fill-color"><span class="toolbar__label">Fill</span><span class="toolbar__button"></span></label>
                  <input id="fill-color" type="color" value="#87EBA6" data-setting="fillColor"/>
               </div>
               <div class="toolbar__option">
                  <label class="toolbar__label" for="stroke-weight">Stroke Weight</label>
                  <input id="stroke-weight" type="number" min="0" max="300" value="10" data-setting="strokeWeight"/>
               </div>
               <div class="toolbar__option">
                  <label class="toolbar__label" for="line-cap">Line Cap:</label>
                  <select id="line-cap" data-setting="lineCap">
                     <option selected="selected" value="round">Round</option>
                     <option value="square">Square</option>
                     <option value="butt">Butt</option>
                  </select>
               </div>
               <div class="toolbar__option">
                  <label class="toolbar__label" for="line-join">Line Join:</label>
                  <select id="line-join" data-setting="lineJoin">
                     <option selected="selected" value="miter">Miter</option>
                     <option value="round">Round</option>
                     <option value="bevel">Bevel</option>
                  </select>
               </div>
               <div class="toolbar__option">
                  <label class="toolbar__toggle" for="guides">Guides</label>
                  <input id="guides" type="checkbox" checked data-setting="guides"/>
               </div>
            </fieldset>
         </li>
      </ul>
      
      <input type="text" name="" class="numgen" class="" style="margin-left: 20px">
      <button id="undo" class="btn btn-outline-success">add value</button>
      <button id="deleteText" class="btn btn-outline-danger">Clear Values</button>
      <button id="clear">Clear</button>
      <button id="saveServer">Save Image</button>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pep/0.4.0/jquery.pep.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
      <script type="text/javascript">
        $('#undo').click(function(){
          var text_val = $(".numgen").val();
            $('body').append('<div id="drag-3" class="draggable"><p>'+text_val+'</p></div>');
          $(".numgen").val('');
        });


        $('#deleteText').click(function(){

            $('.draggable').remove();
            $(".numgen").val('');
        });


        
        $(document).on("click", ".draggable" , function() {
            $('.draggable').css({'padding':'0px','border':'none'});
            $(this).css({'padding':'3px 10px','border':'2px solid green'});
            var textPara_ = $(this).find('p').html();
            $(".numgen").val(textPara_);
        });

      </script>
      
      
      <script type="text/javascript">
         const canvas = document.createElement('canvas'),
              ctx = canvas.getContext('2d'),
              grid = true,
              gridSpacing = 20,
              guidesBtn = document.getElementById('guides'),
              rubberBandRect = {},
              pointerDownLocation = {},
              tools = document.querySelectorAll('input[type="radio"]'),
              optionInputs = {
                sidesSelect: document.getElementById('sides'),
                strokeSelect: document.getElementById('stroke-color'),
                fillSelect: document.getElementById('fill-color'),
                lineCapSelect: document.getElementById('line-cap'),
                lineJoinSelect: document.getElementById('line-join'),
                weightSelect: document.getElementById('stroke-weight')
              },
              settings = {
                shape: 'line',
                strokeColor: optionInputs.strokeSelect.value,
                fillColor: optionInputs.fillSelect.value,
                strokeWeight: optionInputs.weightSelect.value,
                lineCap: optionInputs.lineCapSelect.value,
                polygonSides: optionInputs.sidesSelect.value
              },
              clearBtn = document.getElementById('clear'),
              undoBtn = document.getElementById('undo'),
              debug = true,
              polygons = []
         
         	let imgData = null,
         	    dragging = false;
         
         	function Point(x, y) {
         	  this.x = x;
         	  this.y = y;	
              }
         
         function Polygon(x, y, radius, sides) {
          this.x = x;
          this.y = y;
          this.radius = radius;
          this.sides = sides;
         }
         
         Polygon.prototype = {
          getPoints: function() {
            let points = [],
            angle = 0,
            i;
          
            for (i = 1; i <= this.sides; i++) {
              let point = new Point(this.x + this.radius * Math.cos(angle),
                                    this.y - this.radius * Math.sin(angle));
              points.push(point);
              angle += 2*Math.PI / this.sides;
            }
         
            return points;
          },
          createPath: function(context) {
            let points = this.getPoints();
            
            ctx.moveTo(points[0].x, points[0].y);
         
            for (let i = 1; i < points.length; i++) {
              ctx.lineTo(points[i].x, points[i].y);
            }
         
            ctx.closePath();
          },
          move: function(x, y) {
            this.x = x;
            this.y = y;
          }
         }
         
         function setCanvasSize(width, height) {
          if (width && height) {
            ctx.canvas.width = width;
            ctx.canvas.height = height;    
          } else {
            ctx.canvas.width = window.innerWidth;
            ctx.canvas.height = window.innerHeight;
          }
         }
         
         function unifyCoordinates(x, y) {
          let rect = canvas.getBoundingClientRect();
          return {
            x: Math.floor( (x - rect.left) * (canvas.width / rect.width) ) + 0.5,
            y: Math.floor( (y - rect.top) * (canvas.height / rect.height) ) + 0.5
          }
         }
         
         function saveData() {
          imgData = ctx.getImageData(0, 0, ctx.canvas.width, ctx.canvas.height);
         }
         
         function restoreData() {
          ctx.putImageData(imgData, 0, 0);
         }
         
         function drawGrid(spacing) {
          let canvasWidth = ctx.canvas.width,
              canvasHeight = ctx.canvas.height,
              start = spacing + 0.5,
              iVertLines = Math.floor(canvasWidth / spacing),
              iHorizLines = Math.floor(canvasHeight / spacing),
              i;
          
          ctx.save();
          ctx.strokeStyle = 'rgba(255, 94, 20, 0.3)';
          
          // draw vertical lines
          for (i = start; i < canvasWidth; i += spacing) {
            ctx.beginPath();
            ctx.moveTo(i, 0);
            ctx.lineTo(i, canvasHeight);
            ctx.closePath();
            ctx.stroke();
          }
          
          // draw horizontal lines
          for (i = start; i < canvasHeight; i += spacing) {
            ctx.beginPath();
            ctx.moveTo(0, i);
            ctx.lineTo(canvasWidth, i);
            ctx.closePath();
            ctx.stroke();
          }
          
          ctx.restore();
         }
         
         function clearCanvas() {
          ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
          drawGrid(gridSpacing);
         }

         function Undo(){
          var lastPoint=points.pop();
        }
         
         function drawGuides(location) {
          ctx.save();
          ctx.strokeStyle = 'rgb(255, 94, 20, 0.8)';
          ctx.lineWidth = 1;
          
          ctx.beginPath();
          ctx.moveTo(0, location.y);
          ctx.lineTo(ctx.canvas.width, location.y);
          ctx.closePath();
          ctx.stroke();
          
          ctx.beginPath();
          ctx.moveTo(location.x, 0);
          ctx.lineTo(location.x, ctx.canvas.height);
          ctx.closePath();
          ctx.stroke();
          
          ctx.restore();
         }
         
         
         function drawRubberBandShape(location, shape) {
          ctx.save();  
          ctx.beginPath();
          
          let polygon;
          
          switch (shape) {
            case 'line':
              ctx.moveTo(pointerDownLocation.x,
                         pointerDownLocation.y);
              ctx.lineTo(location.x, location.y);
              break;
          }
          
          ctx.lineCap = settings.lineCap;
          ctx.lineJoin = settings.lineJoin;
          
          if (settings.strokeWeight > 0) {
            ctx.strokeStyle = settings.strokeColor;
            ctx.lineWidth = settings.strokeWeight;
            ctx.stroke();
          }
          
          if (settings.fillColor && settings.shape !== 'line') {
            ctx.fillStyle = settings.fillColor;
            ctx.fill();
          }
          
          ctx.closePath();
          ctx.restore();
          
         }
         
         function onResize() {
          saveData();
          setCanvasSize();
          if (grid) drawGrid(gridSpacing);
          restoreData();
         }
         
         function onPointerDown(e) {
          let location = unifyCoordinates(e.clientX, e.clientY);
          pointerDownLocation.x = location.x;
          pointerDownLocation.y = location.y;
          dragging = true;
          saveData();
          
          //if (debug) drawPointerDownArc();
          if (guidesBtn.checked) drawGuides(location);
         }
         
         function onPointerMove(e) {
          if (dragging) {
            let location = unifyCoordinates(e.clientX, e.clientY);
            restoreData();
            if (guidesBtn.checked) drawGuides(location);
            //makeRubberBandRect(location);
            drawRubberBandShape(location, settings.shape);
            if (debug) {
              //drawPointerDownArc();
              //drawRubberBandReference();
            }
          }
         }
         
         function onPointerUp(e) {
          if (dragging) {
            let location = unifyCoordinates(e.clientX, e.clientY);
            dragging = false;
            restoreData();
            //makeRubberBandRect(location);
            drawRubberBandShape(location, settings.shape);
          }
         }
         
         function onToolChange(e) {
          this.checked = true;
          settings.shape = this.value;
         }
         
         function onOptionChange(e) {
          let option = this.dataset.setting;
          
          if (option === 'strokeColor' || option === 'fillColor') {
            let label = this.previousElementSibling;
            let button = label.querySelector('.toolbar__button');
            button.style.backgroundColor = this.value;
            settings[option] = this.value;
          } else {
            settings[option] = this.value;
          }
         }
         
         window.addEventListener('resize', onResize);
         canvas.addEventListener('pointerdown', onPointerDown);
         canvas.addEventListener('pointermove', onPointerMove);
         canvas.addEventListener('pointerup', onPointerUp);
         clearBtn.addEventListener('click', clearCanvas);
         undoBtn.addEventListener('click', Undo);
         
         for (let tool of tools) {
          tool.addEventListener('click', onToolChange);
         }
         
         for (let i of Object.keys(optionInputs)) {
          optionInputs[i].addEventListener('change', onOptionChange);
          
          // set inital styles
          if (i === 'strokeSelect' || i === 'fillSelect') {
            optionInputs[i].previousElementSibling
              .querySelector('.toolbar__button')
              .style.backgroundColor = optionInputs[i].value;
          }
         }
         
         canvas.setAttribute('touch-action', 'none');
         document.body.appendChild(canvas);
         
         
         onResize();
         clearCanvas();
      </script>
      
      
      
      <script type="text/javascript">
        interact('.draggable')
  .draggable({
    // enable inertial throwing
    inertia: true,
    // keep the element within the area of it's parent
    modifiers: [
      interact.modifiers.restrictRect({
        restriction: 'parent',
        endOnly: true
      })
    ],
    // enable autoScroll
    autoScroll: true,

    listeners: {
      // call this function on every dragmove event
      move: dragMoveListener,

      // call this function on every dragend event
      
    }
  })

function dragMoveListener (event) {
  var target = event.target
  // keep the dragged position in the data-x/data-y attributes
  var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx
  var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy

  // translate the element
  target.style.transform = 'translate(' + x + 'px, ' + y + 'px)'

  // update the posiion attributes
  target.setAttribute('data-x', x)
  target.setAttribute('data-y', y)
}

// this function is used later in the resizing and gesture demos
window.dragMoveListener = dragMoveListener
      </script>
   </body>
</html>