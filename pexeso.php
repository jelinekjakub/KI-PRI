<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Pexeso</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <table class="mx-auto border-collapse">
                <tr>
                    <td class="cursor-pointer w-16 h-16 border border-gray-300 hover:bg-gray-200 transition-colors"></td>
                    <td class="cursor-pointer w-16 h-16 border border-gray-300 hover:bg-gray-200 transition-colors"></td>
                    <td class="cursor-pointer w-16 h-16 border border-gray-300 hover:bg-gray-200 transition-colors"></td>
                </tr>
                <tr>
                    <td class="cursor-pointer w-16 h-16 border border-gray-300 hover:bg-gray-200 transition-colors"></td>
                    <td class="cursor-pointer w-16 h-16 border border-gray-300 hover:bg-gray-200 transition-colors"></td>
                    <td class="cursor-pointer w-16 h-16 border border-gray-300 hover:bg-gray-200 transition-colors"></td>
                </tr>
                <tr>
                    <td class="cursor-pointer w-16 h-16 border border-gray-300 hover:bg-gray-200 transition-colors"></td>
                    <td class="cursor-pointer w-16 h-16 border border-gray-300 hover:bg-gray-200 transition-colors"></td>
                    <td class="cursor-pointer w-16 h-16 border border-gray-300 hover:bg-gray-200 transition-colors"></td>
                </tr>
            </table>

            <div class="mt-4 text-lg font-semibold">
                Count: <span class="text-blue-500">0</span>
            </div>
        </div>

        <script>
            let d = document

            let tds = d.querySelectorAll('td')
            let span = d.querySelector('span')

            tds.countThem = () => {
                let count = 0
                tds.forEach((el) => el.classList.contains('bg-gray-300') && ++count)
                span.innerHTML = count
            }

            tds.forEach(
                (el) =>
                    (el.onclick = () => {
                        el.classList.toggle('bg-gray-300')
                        tds.countThem()
                    }),
            )
        </script>
    </body>
</html>
