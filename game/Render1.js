define(function() {
    class Render{
        context
        constructor(context){
            this.context = context
        }
        draw = function(){
            let context = this.context
            let cw = context.width
            let ch = context.height
            console.log(ch)
            context.clearRect(0, 0, cw, ch)
            context.beginPath()
            context.arc(x, y, 30, 0, (Math.PI * 2), true)
            context.fill()
        }
    }
})