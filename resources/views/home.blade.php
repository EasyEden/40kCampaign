@include('includes/head')

<canvas id="hex-grid" width={{$data[0]->width}} height={{$data[0]->height}}></canvas><br>

<div style="display: none">
        <p>x:</p>
        <input id="x" type="number" readonly value={{ $data[0]->collums}}><br>
        <p>y:</p>
        <input id="y" type="number" readonly value={{ $data[0]->rows}}><br>

        <p>radius:</p>
        <input id="radius" type="number" readonly value={{ $data[0]->radius}}><br><br>

        <script>
            const canvas = document.getElementById('hex-grid');
            const ctx = canvas.getContext('2d');
            var xValue = document.getElementById('x').value;
            var yValue = document.getElementById('y').value;

            const hexRadius = document.getElementById('radius').value;
            const hexHeight = 1.15 * hexRadius;
        </script>

        @foreach($data[1] as $army)
            {{-- <p>army id: {{$army->id}}</p> --}}
            {{-- <p>army tile id:</p> --}}
            <input id={{$army->tileId_id}} type="number" readonly value="{{$army->tile_id}}"><br>
            {{-- <p>army x:</p> --}}
            <input id={{$army->xId}} type="number" readonly value="{{$army->x}}"><br>
            {{-- <p>army y: {{$army->y}}</p> --}}
            <input id={{$army->yId}} type="number" readonly value="{{$army->y}}"><br>

            <input id={{$army->factionColour}} type="text" readonly value="{{$army->factionColour}}"><br><br>

            <script>
                // var number = 0
                function drawHexagon(x, y) {
                    // number++;
                    // console.log(number);
                    // console.log("x: " , x , " -y: " , y);
                    ctx.beginPath();
                    for (let i = 0; i < 6; i++) {
                        const angleRad = Math.PI / 3 * i;
                        const xPos = x + hexRadius * Math.cos(angleRad);
                        const yPos = y + hexRadius * Math.sin(angleRad);
                        if (i === 0) {
                            ctx.moveTo(xPos, yPos);
                        } else {
                            ctx.lineTo(xPos, yPos);
                        }
                    }
                    ctx.closePath();
                    ctx.strokeStyle = 'black';
                    ctx.stroke();
                }

                function drawArmy(armyX, armyY) {
                    // number++;
                    // console.log(number);
                    var armyFactionColour = document.getElementById('{{$army->factionColour}}').value;
                    // console.log("armyX:", armyX, "armyY:", armyY);
                    ctx.beginPath();
                    for (let i = 0; i < 6; i++) {
                        const angleRad = Math.PI / 3 * i;
                        const xPos = armyX + hexRadius * Math.cos(angleRad);
                        const yPos = armyY + hexRadius * Math.sin(angleRad);
                        if (i === 0) {
                            ctx.moveTo(xPos, yPos);
                        } else {
                            ctx.lineTo(xPos, yPos);
                        }
                    }
                    ctx.fillStyle = armyFactionColour;
                    ctx.fill();
                    ctx.strokeStyle = 'black';
                    ctx.stroke();
                }

                function drawHexGrid(rows, cols) {
                    // var total = rows * cols;
                    // console.log(total);
                    var gridWidth = cols * hexRadius * Math.sqrt(3);
                    var gridWidth = Math.round(gridWidth);
                    var gridHeight = rows * hexHeight * 1.5;
                    var gridHeight = Math.round(gridHeight);

                    const startX = (canvas.width - gridWidth) / 2;
                    const startY = (canvas.height - gridHeight) / 2;

                    var armyX = parseFloat(document.getElementById('{{$army->xId}}').value);
                    var armyY = parseFloat(document.getElementById('{{$army->yId}}').value);

                    for (let i = 0; i < rows; i++) {
                        for (let j = 0; j < cols; j++) {
                            const x = startX + j * hexRadius * 3 / 2;
                            const y = startY + i * hexHeight * 3 / 2;
                            if (j % 2 !== 0) {
                                ctx.translate(0, hexHeight * 3 / 4);
                            }

                            if(x > armyX || y > armyY || x < armyX || y < armyY) {
                                drawHexagon(x, y);
                            }

                            if(x === armyX && y === armyY) {
                                rl = 20;
                                for(r = 0; r <= rl; r++) {
                                    drawArmy(armyX, armyY);
                                }
                            }

                            ctx.setTransform(1, 0, 0, 1, 0, 0);
                        }
                    }
                }

                drawHexGrid(yValue, xValue);
            </script>
         @endforeach
</div>
</body>
</html>