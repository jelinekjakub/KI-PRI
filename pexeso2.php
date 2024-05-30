<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Pexeso</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <table class="mx-auto border-collapse"></table>
        </div>

        <script>
            const d = document;
            const appendElement = (parent, tag) => {
                const elem = d.createElement(tag);
                parent.appendChild(elem);
                return elem;
            }

            const shuffleArray = (array) => {
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
                return array;
            }

            const table = d.querySelector('table');
            const rows = 6, cols = 6;

            // Generate numbers from 1 to 36, each appearing twice
            const numbers = Array.from({ length: 36 }, (_, i) => Math.ceil((i + 1) / 2));
            shuffleArray(numbers);

            const tds = [];
            let i = 0;
            for (let r = 0; r < rows; r++) {
                const tr = appendElement(table, 'tr');
                for (let c = 0; c < cols; c++) {
                    const td = appendElement(tr, 'td');
                    tds.push(td);
                    td.innerHTML = numbers[i++];
                    td.classList.add('cursor-pointer', 'w-16', 'h-16', 'border', 'border-gray-300', 'text-center', 'hover:bg-gray-200', 'transition-colors');

                    td.onclick = () => {
                        td.classList.toggle('bg-gray-300');

                        // a short delay
                        setTimeout(() => {
                            const selected = tds.filter(td => td.classList.contains('bg-gray-300'));

                            if (selected.length === 2) {
                                if (selected[0].innerHTML === selected[1].innerHTML) {
                                    selected.forEach(td => {
                                        td.classList.add('bg-white', 'text-white');
                                        td.classList.remove('bg-gray-300');
                                    });
                                } else {
                                    selected.forEach(td => {
                                        td.classList.remove('bg-gray-300');
                                    });
                                }
                            }
                        }, 300);
                    }
                }
            }
        </script>
    </body>
</html>
