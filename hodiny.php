<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Programování pro internet</title>
    <script>
      let addElem = (parent, tag) => {
        let elem = document.createElementNS('http://www.w3.org/2000/svg', tag)
        parent.append(elem)
        return elem
      }

      function tickTock() {
        let divTime = document.getElementById('time')
        let clock = document.getElementById('clock')

        let hourHand = addElem(clock, 'line')
        hourHand.setAttribute('x1', '0')
        hourHand.setAttribute('y1', '0')
        hourHand.setAttribute('x2', '0')
        hourHand.setAttribute('y2', '90')
        hourHand.setAttribute('stroke-width', '8')

        let minuteHand = addElem(clock, 'line')
        minuteHand.setAttribute('x1', '0')
        minuteHand.setAttribute('y1', '0')
        minuteHand.setAttribute('x2', '0')
        minuteHand.setAttribute('y2', '115')
        minuteHand.setAttribute('stroke-width', '4')
        
        let secondHand = addElem(clock, 'line')
        secondHand.setAttribute('x1', '0')
        secondHand.setAttribute('y1', '0')
        secondHand.setAttribute('x2', '0')
        secondHand.setAttribute('y2', '130')
        secondHand.setAttribute('stroke-width', '2')
        secondHand.setAttribute('stroke', 'red')

        let hub = addElem(clock, 'circle')
        hub.setAttribute('r', '4')

        let interval
        let ticking = true

        let tick = () => {
          let now = new Date()
          divTime.textContent = now.toLocaleTimeString()

          let sec = now.getSeconds()
          let min = now.getMinutes()
          let hr = now.getHours() % 12

          secondHand.setAttribute('transform', `rotate(${sec * 6}, 0, 0)`)
          minuteHand.setAttribute('transform', `rotate(${min * 6}, 0, 0)`)
          hourHand.setAttribute('transform', `rotate(${hr * 30 + min / 2}, 0, 0)`)
        }

        let startTicking = () => {
          tick()
          interval = setInterval(tick, 1000)
        }

        let stopTicking = () => {
          clearInterval(interval)
        }

        let toggleTicking = () => {
          if (ticking) {
            stopTicking()
          } else {
            startTicking()
          }
          ticking = !ticking
        }

        document.getElementById('svg').addEventListener('click', toggleTicking)
        startTicking()
      }
    </script>
  </head>

  <body onload="tickTock()" class="flex flex-col justify-center items-center p-5 pb-16 bg-gray-100 min-h-screen">
    <svg width="300" id="svg" height="300" class="border-2 border-gray-500 rounded-full shadow-lg cursor-pointer">
      <g
        id="clock"
        transform="translate(150 150) rotate(180, 0, 0)"
        stroke="black"
        stroke-linecap="round"
      >
      </g>
    </svg>
    <div id="time" class="text-2xl mt-4 tracking-widest"></div>
  </body>
</html>
