<section class="w-full">
    <div class="w-full sm:px-4">
        <div class="relative w-64">
            <!-- Datepicker Input with Icons -->
            <div class="relative flex items-center">
                <input
                    id="datepicker"
                    name="fechas"
                    type="text"
                    class="py-2 pe-4 mr-2 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Selecciona fechas"
                    readonly
                />

                <span class="absolute right-0 cursor-pointer pr-4 text-gray-400 dark:text-white/60" id="toggleDatepicker">
                    <!-- Arrow Down Icon -->
                    <svg
                    class="fill-current stroke-current"
                    width="16"
                    height="16"
                    viewBox="0 0 16 16"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path
                        d="M2.29635 5.15354L2.29632 5.15357L2.30055 5.1577L7.65055 10.3827L8.00157 10.7255L8.35095 10.381L13.701 5.10603L13.701 5.10604L13.7035 5.10354C13.722 5.08499 13.7385 5.08124 13.7499 5.08124C13.7613 5.08124 13.7778 5.08499 13.7963 5.10354C13.8149 5.12209 13.8187 5.13859 13.8187 5.14999C13.8187 5.1612 13.815 5.17734 13.7973 5.19552L8.04946 10.8433L8.04945 10.8433L8.04635 10.8464C8.01594 10.8768 7.99586 10.8921 7.98509 10.8992C7.97746 10.8983 7.97257 10.8968 7.96852 10.8952C7.96226 10.8929 7.94944 10.887 7.92872 10.8721L2.20253 5.2455C2.18478 5.22733 2.18115 5.2112 2.18115 5.19999C2.18115 5.18859 2.18491 5.17209 2.20346 5.15354C2.222 5.13499 2.2385 5.13124 2.2499 5.13124C2.2613 5.13124 2.2778 5.13499 2.29635 5.15354Z"
                        fill=""
                        stroke=""
                    />
                    </svg>
                </span>
            </div>

            <!-- Datepicker Container -->
            <div id="datepicker-container" class="shadow-lg absolute mt-2 hidden w-96 rounded-xl border border-stroke bg-white pt-5 p-2 dark:border-dark-3 dark:bg-dark-2">
                <div class="flex items-center justify-between">
                    <button type="button" id="prevMonth" class="rounded-md px-2 py-2 text-dark hover:bg-gray-200 dark:text-white dark:hover:bg-dark-3">
                        <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5312 17.9062C13.3437 17.9062 13.1562 17.8438 13.0312 17.6875L5.96875 10.5C5.6875 10.2187 5.6875 9.78125 5.96875 9.5L13.0312 2.3125C13.3125 2.03125 13.75 2.03125 14.0312 2.3125C14.3125 2.59375 14.3125 3.03125 14.0312 3.3125L7.46875 10L14.0625 16.6875C14.3438 16.9688 14.3438 17.4062 14.0625 17.6875C13.875 17.8125 13.7187 17.9062 13.5312 17.9062Z" fill=""/>
                        </svg>
                    </button>
                    <div id="currentMonth" class="text-lg font-medium text-dark-3 dark:text-white"></div>
                    <button type="button" id="nextMonth" class="rounded-md px-2 py-2 text-dark hover:bg-gray-200 dark:text-white dark:hover:bg-dark-3">
                        <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.46875 17.9063C6.28125 17.9063 6.125 17.8438 5.96875 17.7188C5.6875 17.4375 5.6875 17 5.96875 16.7188L12.5312 10L5.96875 3.3125C5.6875 3.03125 5.6875 2.59375 5.96875 2.3125C6.25 2.03125 6.6875 2.03125 6.96875 2.3125L14.0313 9.5C14.3125 9.78125 14.3125 10.2187 14.0313 10.5L6.96875 17.6875C6.84375 17.8125 6.65625 17.9063 6.46875 17.9063Z" fill=""/>
                        </svg>
                    </button>
                </div>
                <div class="mb-4 mt-6 grid grid-cols-7 gap-x-4">
                    <div class="text-center text-sm font-medium text-blue-500">Sun</div>
                    <div class="text-center text-sm font-medium text-blue-500">Mon</div>
                    <div class="text-center text-sm font-medium text-blue-500">Tue</div>
                    <div class="text-center text-sm font-medium text-blue-500">Wed</div>
                    <div class="text-center text-sm font-medium text-blue-500">Thu</div>
                    <div class="text-center text-sm font-medium text-blue-500">Fri</div>
                    <div class="text-center text-sm font-medium text-blue-500">Sat</div>
                </div>
                <div id="days-container" class="mt-2 grid grid-cols-7 gap-y-1"></div>
                <!-- Buttons -->
                <div class="mt-5 flex justify-end space-x-2.5 border-t border-stroke p-2 dark:border-dark-3">
                    <button type="submit" id="cancelButton" class="rounded-lg border border-blue-500 px-5 py-1.5 text-base font-medium text-blue-500 hover:bg-blue-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5"><path d="M10 2v2"/><path d="M14 2v4"/><path d="M17 2a1 1 0 0 1 1 1v9H6V3a1 1 0 0 1 1-1z"/><path d="M6 12a1 1 0 0 0-1 1v1a2 2 0 0 0 2 2h2a1 1 0 0 1 1 1v2.9a2 2 0 1 0 4 0V17a1 1 0 0 1 1-1h2a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1"/></svg>
                    </button>
                    <button type="submit" id="applyButton" class="rounded-lg bg-blue-600 px-5 py-1.5 text-base font-medium text-white hover:bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const datepicker = document.getElementById("datepicker");
    const datepickerContainer = document.getElementById(
        "datepicker-container",
    );
    const daysContainer = document.getElementById("days-container");
    const currentMonthElement = document.getElementById("currentMonth");
    const prevMonthButton = document.getElementById("prevMonth");
    const nextMonthButton = document.getElementById("nextMonth");
    const cancelButton = document.getElementById("cancelButton");
    const applyButton = document.getElementById("applyButton");
    const toggleDatepicker = document.getElementById("toggleDatepicker");

    let currentDate = new Date();
    let selectedStartDate = '{{ $fechaI == "" ? "" : date("d/m/Y", strtotime($fechaI)) }}';
    let selectedEndDate = '{{ $fechaF == "" ? "" : date("d/m/Y", strtotime($fechaF)) }}';

    if (selectedStartDate != '' && selectedEndDate != '') {
        updateInput()
    }

    // Function to render the calendar
    function renderCalendar(dateFormat = "en-GB") {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        // Mostrar el mes y el año en el formato especificado
        currentMonthElement.textContent = currentDate.toLocaleDateString(dateFormat, {
            month: "long",
            year: "numeric",
        });

        daysContainer.innerHTML = "";

        // Obtener el primer día del mes y la cantidad de días en el mes
        const firstDayOfMonth = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Añadir días vacíos para alinear el primer día del mes
        for (let i = 0; i < firstDayOfMonth; i++) {
            daysContainer.innerHTML += `<div></div>`;
        }

        // Añadir los días del mes
        for (let i = 1; i <= daysInMonth; i++) {
            const day = new Date(year, month, i);
            const dayString = day.toLocaleDateString(dateFormat); // Formatear la fecha según el formato especificado

            let className =
                "flex items-center justify-center content-center cursor-pointer w-full h-[46px] rounded-full text-gray-800 dark:text-gray-700 hover:bg-blue-500 hover:text-white";

            // Resaltar la fecha de inicio seleccionada
            if (selectedStartDate && dayString === selectedStartDate) {
                className += " bg-blue-500 text-white dark:text-white rounded-r-none";
            }

            // Resaltar la fecha de fin seleccionada
            if (selectedEndDate && dayString === selectedEndDate) {
                className += " bg-blue-500 text-white dark:text-white rounded-l-none";
            }

            const [dayd, monthd, yeard] = selectedStartDate == null ? '' : selectedStartDate.split("/"); // Separar día, mes y año
            const formattedDateString = `${yeard}-${monthd}-${dayd}`; // Convertir a AAAA-MM-DD
            const dateFromString = new Date(yeard, monthd-1, dayd); // Crear objeto Date



            const [dayf, monthf, yearf] = selectedEndDate == null ? '' : selectedEndDate.split("/");
            const formattedDateStringf = `${yearf}-${monthf}-${dayf}`; // Convertir a AAAA-MM-DD
            const dateFromStringf = new Date(yearf, monthf-1, dayf); // Crear objeto Date


            if (
                selectedStartDate &&
                selectedEndDate &&
                day.getTime() > dateFromString.getTime() && // Día posterior a la fecha inicial
                day.getTime() < dateFromStringf.getTime()
            ) {
                className += " bg-gray-800 text-white rounded-none"; // Clase personalizada para el rango
            }

            // Añadir el día al contenedor
            daysContainer.innerHTML += `<div class="${className}" data-date="${dayString}">${i}</div>`;
        }

        // Agregar event listeners a los días
        document.querySelectorAll("#days-container div").forEach((day) => {
            day.addEventListener("click", function (event) {
                event.stopPropagation(); // Evitar que el evento se propague

                const selectedDay = this.dataset.date;

                if (!selectedStartDate || (selectedStartDate && selectedEndDate)) {
                    selectedStartDate = selectedDay;
                    selectedEndDate = null;
                } else {
                    if (new Date(selectedDay) < new Date(selectedStartDate)) {
                        selectedEndDate = selectedStartDate;
                        selectedStartDate = selectedDay;
                    } else {
                        selectedEndDate = selectedDay;
                    }
                }

                updateInput();
                renderCalendar(dateFormat); // Volver a renderizar el calendario con el mismo formato
            });
        });
    }

    // Function to update the datepicker input
    function updateInput() {
        if (selectedStartDate && selectedEndDate) {
        datepicker.value = `${selectedStartDate} - ${selectedEndDate}`;
        } else if (selectedStartDate) {
        datepicker.value = selectedStartDate;
        } else {
        datepicker.value = "";
        }
    }

    // Toggle datepicker visibility
    datepicker.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevent click from bubbling up to document
        datepickerContainer.classList.toggle("hidden");
        renderCalendar();
    });

    toggleDatepicker.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevent click from bubbling up to document
        datepickerContainer.classList.toggle("hidden");
        renderCalendar();
    });

    // Navigate months
    prevMonthButton.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextMonthButton.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    // Cancel selection and close calendar
    cancelButton.addEventListener("click", function () {
        selectedStartDate = null;
        selectedEndDate = null;
        updateInput();
        datepickerContainer.classList.add("hidden");
    });

    // Apply selection and close calendar
    applyButton.addEventListener("click", function () {
        updateInput();
        datepickerContainer.classList.add("hidden");
    });

    // Close calendar when clicking outside of it
    document.addEventListener("click", function (event) {
        if (
        !datepicker.contains(event.target) &&
        !datepickerContainer.contains(event.target)
        ) {
        datepickerContainer.classList.add("hidden");
        }
    });
</script>
