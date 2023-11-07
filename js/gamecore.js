window.addEventListener('load', function () {
    const canvas = document.getElementById('gamecanvas');
    if (canvas.getContext) {
        const context = canvas.getContext("2d");
        canvas.width = 500
        canvas.height = 150

        let fps_max = 100
        let lastTime
        function main(){
            let now = Date.now
            let dt = (now - lastTime) / 1000
            requestAnimationFrame(main)
        }

        const cw = canvas.width
        const ch = canvas.height
        let x = 0, y = 0, dx = 50, dy = 50
        context.fillStyle = 'white'
        //
        
        function move1() {
            if (x + dx < cw) {
                x += 5*dt
            } else{
                x = 0
            }
            if (y + dy < ch) {
                y += dx
            } else{
                y = 0
            }
            paint(context, cw, ch, x, y)
        }
        function paint(context, cw, ch, x, y) {
            context.clearRect(0, 0, cw, ch)
            context.beginPath()
            context.arc(x, y, 30, 0, (Math.PI * 2), true)
            context.fill()
        }
    }
})