let travelerCount = 1;
const pricePerPerson = tripPrice;
const depositPercent = 0.2;
const bankChargePercent = 0.035;

function changeTravelers(delta) {
    travelerCount = Math.max(1, travelerCount + delta);
    updateUI();
}

function updateUI() {
    document.getElementById("traveler-count-val").innerText = travelerCount;
    document.getElementById("header-traveler-count").innerText = travelerCount;

    const totalTripPrice = travelerCount * pricePerPerson;
    const depositAmount = totalTripPrice * depositPercent;
    const bankCharge = depositAmount * bankChargePercent;
    const totalPayableNow = depositAmount + bankCharge;

    document.getElementById("traveler-count-summary").innerText = travelerCount;
    document.getElementById("trip-total-display").innerText = totalTripPrice;
    document.getElementById("deposit-amount").innerText =
        depositAmount.toFixed(2);
    document.getElementById("bank-charge").innerText = bankCharge.toFixed(2);
    document.getElementById("total-payable").innerText =
        totalPayableNow.toFixed(2);

    syncTravelerForms();
}

function syncTravelerForms() {
    const container = document.getElementById("traveler-forms");
    const currentForms = container.querySelectorAll("section").length;

    if (travelerCount > currentForms) {
        for (let i = currentForms + 1; i <= travelerCount; i++) {
            const section = document.createElement("section");
            section.id = `traveler-${i}`;
            section.innerHTML = `

                        <div class="flex items-center gap-3 mb-6">
                            <div>
                                <span class="w-6 h-6 rounded-full text-sm flex items-center justify-center bg-brand-400 text-white">${i + 1}</span>
                            </div>
                            <h4 class="text-lg font-extrabold text-slate-800"> Traveller  <span class="text-brand-400">#${i}</span>  </h4>
                        </div>
                        <div class="pl-9 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <input type="text" id="fullName" name="travelers[${i}][full_name]"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="Full Name*" required />
                                </div>
                                <div>

                                    <select id="gender" name="travelers[${i}][gender]"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        required>
                                        <option value="" disabled selected hidden>Gender*</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="email" id="email" name="travelers[${i}][email]"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="E-mail ID*" required />
                                </div>
                                <div>
                                    <input type="text" id="nationality" name="travelers[${i}][nationality]"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="Nationality*" required />
                                </div>


                                <div class="md:col-span-2">
                                    <div class="grid grid-cols-3 gap-2">
                                        <input type="date" id="DOB" name="travelers[${i}][dob]" max="<?= date('Y-m-d') ?>"
                                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                            placeholder="Date of Birth*" required />
                                        <input type="text" id="mobile" name="travelers[${i}][mobile]" placeholder="Mobile number*"
                                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                        <input type="text" id="passport" name="travelers[${i}][passport]"
                                            placeholder="Passport no*"
                                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                    </div>
                                </div>

                            </div>
                        </div>
                    `;
            container.appendChild(section);
        }
    } else if (travelerCount < currentForms) {
        for (let i = currentForms; i > travelerCount; i--) {
            const form = document.getElementById(`traveler-${i}`);
            if (form) form.remove();
        }
    }

    // Re-index section numbers for sections after traveler list
    const allSections = document.querySelectorAll("section");
    allSections.forEach((sec, idx) => {
        const numSpan = sec.querySelector(".section-number");
        if (numSpan) numSpan.innerText = idx + 1;
    });
}

// yes no flight booking
document.addEventListener("DOMContentLoaded", () => {
    const flightRadios = document.querySelectorAll(
        'input[name="flight-status"]',
    );
    const flightInfo = document.getElementById("flight-info");

    function toggleFlightInfo() {
        if (
            document.querySelector('input[name="flight-status"]:checked')
                ?.value === "booked"
        ) {
            flightInfo.style.display = "block";
        } else {
            flightInfo.style.display = "none";
        }
    }

    // Add event listeners
    flightRadios.forEach((radio) => {
        radio.addEventListener("change", toggleFlightInfo);
    });
});
// specify
document.addEventListener("DOMContentLoaded", () => {
    const findUsSelect = document.getElementById("find-us");
    const specifyInput = document.querySelector(".specify");

    findUsSelect.addEventListener("change", () => {
        specifyInput.style.display =
            findUsSelect.value === "Others" ? "block" : "none";
    });
});
document.addEventListener("DOMContentLoaded", () => {
    updateUI();
});

