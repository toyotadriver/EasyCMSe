// function Main(context) {
//     this.context = context

//     //this.handleInput = new handleInput()


//     this.lastTick = 0
//     this.start = function () {
//         let now = Date.now
//         let dt = (now - lastTick) / 1000

//         this.update(dt)
//         require(['Render'], function (Render) {
//             render = new Render(this.context)
//             render.draw()
//         })
//         this.lastTick = now
//         requestAnimationFrame(this.start())
//     }
//     return Main
// }
class Main{
    context
    render
    lastTick = 0
    constructor(context){
        this.context = context
        this.render = require(['Render'], function(Render) {
            return new Render(this.context)
        })
    }
    start = function(){
        let now = Date.now
        let dt = (now - this.lastTick) / 1000
        

        // this.update(dt)
        console.log(this.render)
        this.lastTick = now
        requestAnimationFrame(this.start())
    }
}

window.addEventListener('load', function () {
    const canvas = document.getElementById('gamecanvas')
    const context = canvas.getContext('2d')
    canvas.width = 800
    canvas.height = 600
    let main = new Main(context)
    console.log(main)
    main.start()
})

