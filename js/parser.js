window.addEventListener('load', function () {
    const container = document.getElementById('cont-for-scrpts')


    xhr = new XMLHttpRequest()
    xhr.open('GET', "https://jsonplaceholder.typicode.com/users")
    xhr.send()
    let users = ''
    xhr.onload = function () {
        container.innerHTML = 'Загруджаетсья'
        let responsecont = document.createElement('div')
        console.log(users)
        users = xhr.response
        responsecont.innerHTML = users
        container.append(responsecont)

        if (users != '') {
            console.log('Щас будет')
            const xhrs = new XMLHttpRequest()
            xhrs.open('POST', 'parseusers')
            xhrs.send([users])

            xhrs.onload = function () {
                let responsecont2 = document.createElement('div')
                let resp = xhrs.response
                responsecont2.innerHTML = resp
                container.append(responsecont2)
            }
        } else {
            console.log('А нету')
        }
    }


    xhr.onerror = function () {
        container.innerHTML = 'Ошибочка плучилась V.V'
    }
})