
let travelerCount = 1;
const pricePerPerson = 1525;
const depositPercent = 0.20;
const bankChargePercent = 0.035;

function changeTravelers(delta) {
    travelerCount = Math.max(1, travelerCount + delta);
    updateUI();
}

function updateUI() {
    document.getElementById('traveler-count-val').innerText = travelerCount;
    document.getElementById('header-traveler-count').innerText = travelerCount;

    const totalTripPrice = travelerCount * pricePerPerson;
    const depositAmount = totalTripPrice * depositPercent;
    const bankCharge = depositAmount * bankChargePercent;
    const totalPayableNow = depositAmount + bankCharge;

    document.getElementById('traveler-count-summary').innerText = travelerCount;
    document.getElementById('trip-total-display').innerText = totalTripPrice;
    document.getElementById('deposit-amount').innerText = depositAmount.toFixed(2);
    document.getElementById('bank-charge').innerText = bankCharge.toFixed(2);
    document.getElementById('total-payable').innerText = totalPayableNow.toFixed(2);

    syncTravelerForms();
}

function syncTravelerForms() {
    const container = document.getElementById('traveler-forms');
    const currentForms = container.querySelectorAll('section').length;

    if (travelerCount > currentForms) {
        for (let i = currentForms + 1; i <= travelerCount; i++) {
            const section = document.createElement('section');
            section.id = `traveler-${i}`;
            section.innerHTML = `
                        
                        <div class="flex items-center gap-3 mb-6">
                                    <div>
                                        <span class="w-6 h-6 rounded-full text-sm flex items-center justify-center bg-brand-400 text-white">${i+1}</span>
                                    </div>
                                    <h4 class="text-lg font-extrabold text-slate-800"> Traveller  <span class="text-brand-400">#${i}</span>  </h4>
                                </div>
                        <div class="pl-9 space-y-4">
                             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>

                                            <input type="text" id="fullName"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                placeholder="Full Name*" required />
                                        </div>
                                        <div>

                                            <select id="gender"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                required>
                                                 <option value="" disabled selected hidden>Gender*</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        <div>

                                            <input type="email" id="email"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                placeholder="E-mail ID*" required />
                                        </div>
                                        <div>


                                            <select id="nationality"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                required>
                                                <option disabled selected hidden>Select nationality*</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Aland Islands">Aland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="AmericanSamoa">AmericanSamoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia, Plurinational State of">Bolivia, Plurinational
                                                    State of</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
                                                    Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic
                                                </option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of the Congo">Congo, The
                                                    Democratic Republic of the Congo</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                                </option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                                    State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of Persian Gulf">Iran, Islamic
                                                    Republic of Persian Gulf</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of Korea">Korea,
                                                    Democratic People's Republic of Korea</option>
                                                <option value="Korea, Republic of South Korea">Korea, Republic of South
                                                    Korea</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of Micronesia">Micronesia,
                                                    Federated States of Micronesia</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands
                                                </option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                    Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                <option value="Saint Helena, Ascension and Tristan Da Cunha">Saint
                                                    Helena, Ascension and Tristan Da Cunha</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Martin">Saint Martin</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                                </option>
                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                                    Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Sudan">South Sudan</option>
                                                <option value="South Georgia and the South Sandwich Islands">South
                                                    Georgia and the South Sandwich Islands</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of Tanzania">Tanzania, United
                                                    Republic of Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-Leste">Timor-Leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands
                                                </option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela, Bolivarian Republic of Venezuela">Venezuela,
                                                    Bolivarian Republic of Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>


                                        <div class="md:col-span-2">
                                            <div class="grid grid-cols-3 gap-2">
                                                <select
                                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                                   <option value="" disabled selected hidden>Birth Year</option>
                                                    <option value="1941">1941</option>
                                                    <option value="1942">1942</option>
                                                    <option value="1943">1943</option>
                                                    <option value="1944">1944</option>
                                                    <option value="1945">1945</option>
                                                    <option value="1946">1946</option>
                                                    <option value="1947">1947</option>
                                                    <option value="1948">1948</option>
                                                    <option value="1949">1949</option>
                                                    <option value="1950">1950</option>
                                                    <option value="1951">1951</option>
                                                    <option value="1952">1952</option>
                                                    <option value="1953">1953</option>
                                                    <option value="1954">1954</option>
                                                    <option value="1955">1955</option>
                                                    <option value="1956">1956</option>
                                                    <option value="1957">1957</option>
                                                    <option value="1958">1958</option>
                                                    <option value="1959">1959</option>
                                                    <option value="1960">1960</option>
                                                    <option value="1961">1961</option>
                                                    <option value="1962">1962</option>
                                                    <option value="1963">1963</option>
                                                    <option value="1964">1964</option>
                                                    <option value="1965">1965</option>
                                                    <option value="1966">1966</option>
                                                    <option value="1967">1967</option>
                                                    <option value="1968">1968</option>
                                                    <option value="1969">1969</option>
                                                    <option value="1970">1970</option>
                                                    <option value="1971">1971</option>
                                                    <option value="1972">1972</option>
                                                    <option value="1973">1973</option>
                                                    <option value="1974">1974</option>
                                                    <option value="1975">1975</option>
                                                    <option value="1976">1976</option>
                                                    <option value="1977">1977</option>
                                                    <option value="1978">1978</option>
                                                    <option value="1979">1979</option>
                                                    <option value="1980">1980</option>
                                                    <option value="1981">1981</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                </select>
                                                <select
                                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                                    <option value=""  disabled selected hidden>Birth Month</option>
                                                    <option value="01">Jan</option>
                                                    <option value="02">Feb</option>
                                                    <option value="03">Mar</option>
                                                    <option value="04">Apr</option>
                                                    <option value="05">May</option>
                                                    <option value="06">Jun</option>
                                                    <option value="07">Jul</option>
                                                    <option value="08">Aug</option>
                                                    <option value="09">Sep</option>
                                                    <option value="10">Oct</option>
                                                    <option value="11">Nov</option>
                                                    <option value="12">Dec</option>
                                                </select>
                                                <select
                                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                                    <option value=""  disabled selected hidden>Birth Day</option>
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="md:col-span-2">
                                            <div class="grid grid-cols-3 gap-2">

                                                <div>
                                                    <select
                                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                                        <option value=""  disabled selected hidden>Country Code*</option>
                                                        <option value="+93">AF (+93)</option>
                                                        <option value="+358">AX (+358)</option>
                                                        <option value="+355">AL (+355)</option>
                                                        <option value="+213">DZ (+213)</option>
                                                        <option value="+1684">AS (+1684)</option>
                                                        <option value="+376">AD (+376)</option>
                                                        <option value="+244">AO (+244)</option>
                                                        <option value="+1264">AI (+1264)</option>
                                                        <option value="+672">AQ (+672)</option>
                                                        <option value="+1268">AG (+1268)</option>
                                                        <option value="+54">AR (+54)</option>
                                                        <option value="+374">AM (+374)</option>
                                                        <option value="+297">AW (+297)</option>
                                                        <option value="+61">AU (+61)</option>
                                                        <option value="+43">AT (+43)</option>
                                                        <option value="+994">AZ (+994)</option>
                                                        <option value="+1242">BS (+1242)</option>
                                                        <option value="+973">BH (+973)</option>
                                                        <option value="+880">BD (+880)</option>
                                                        <option value="+1246">BB (+1246)</option>
                                                        <option value="+375">BY (+375)</option>
                                                        <option value="+32">BE (+32)</option>
                                                        <option value="+501">BZ (+501)</option>
                                                        <option value="+229">BJ (+229)</option>
                                                        <option value="+1441">BM (+1441)</option>
                                                        <option value="+975">BT (+975)</option>
                                                        <option value="+591">BO (+591)</option>
                                                        <option value="+387">BA (+387)</option>
                                                        <option value="+267">BW (+267)</option>
                                                        <option value="+55">BR (+55)</option>
                                                        <option value="+246">IO (+246)</option>
                                                        <option value="+673">BN (+673)</option>
                                                        <option value="+359">BG (+359)</option>
                                                        <option value="+226">BF (+226)</option>
                                                        <option value="+257">BI (+257)</option>
                                                        <option value="+855">KH (+855)</option>
                                                        <option value="+237">CM (+237)</option>
                                                        <option value="+1">CA (+1)</option>
                                                        <option value="+238">CV (+238)</option>
                                                        <option value="+ 345">KY (+ 345)</option>
                                                        <option value="+236">CF (+236)</option>
                                                        <option value="+235">TD (+235)</option>
                                                        <option value="+56">CL (+56)</option>
                                                        <option value="+86">CN (+86)</option>
                                                        <option value="+61">CX (+61)</option>
                                                        <option value="+61">CC (+61)</option>
                                                        <option value="+57">CO (+57)</option>
                                                        <option value="+269">KM (+269)</option>
                                                        <option value="+242">CG (+242)</option>
                                                        <option value="+243">CD (+243)</option>
                                                        <option value="+682">CK (+682)</option>
                                                        <option value="+506">CR (+506)</option>
                                                        <option value="+225">CI (+225)</option>
                                                        <option value="+385">HR (+385)</option>
                                                        <option value="+53">CU (+53)</option>
                                                        <option value="+357">CY (+357)</option>
                                                        <option value="+420">CZ (+420)</option>
                                                        <option value="+45">DK (+45)</option>
                                                        <option value="+253">DJ (+253)</option>
                                                        <option value="+1767">DM (+1767)</option>
                                                        <option value="+1849">DO (+1849)</option>
                                                        <option value="+593">EC (+593)</option>
                                                        <option value="+20">EG (+20)</option>
                                                        <option value="+503">SV (+503)</option>
                                                        <option value="+240">GQ (+240)</option>
                                                        <option value="+291">ER (+291)</option>
                                                        <option value="+372">EE (+372)</option>
                                                        <option value="+251">ET (+251)</option>
                                                        <option value="+500">FK (+500)</option>
                                                        <option value="+298">FO (+298)</option>
                                                        <option value="+679">FJ (+679)</option>
                                                        <option value="+358">FI (+358)</option>
                                                        <option value="+33">FR (+33)</option>
                                                        <option value="+594">GF (+594)</option>
                                                        <option value="+689">PF (+689)</option>
                                                        <option value="+241">GA (+241)</option>
                                                        <option value="+220">GM (+220)</option>
                                                        <option value="+995">GE (+995)</option>
                                                        <option value="+49">DE (+49)</option>
                                                        <option value="+233">GH (+233)</option>
                                                        <option value="+350">GI (+350)</option>
                                                        <option value="+30">GR (+30)</option>
                                                        <option value="+299">GL (+299)</option>
                                                        <option value="+1473">GD (+1473)</option>
                                                        <option value="+590">GP (+590)</option>
                                                        <option value="+1671">GU (+1671)</option>
                                                        <option value="+502">GT (+502)</option>
                                                        <option value="+44">GG (+44)</option>
                                                        <option value="+224">GN (+224)</option>
                                                        <option value="+245">GW (+245)</option>
                                                        <option value="+595">GY (+595)</option>
                                                        <option value="+509">HT (+509)</option>
                                                        <option value="+379">VA (+379)</option>
                                                        <option value="+504">HN (+504)</option>
                                                        <option value="+852">HK (+852)</option>
                                                        <option value="+36">HU (+36)</option>
                                                        <option value="+354">IS (+354)</option>
                                                        <option value="+91">IN (+91)</option>
                                                        <option value="+62">ID (+62)</option>
                                                        <option value="+98">IR (+98)</option>
                                                        <option value="+964">IQ (+964)</option>
                                                        <option value="+353">IE (+353)</option>
                                                        <option value="+44">IM (+44)</option>
                                                        <option value="+972">IL (+972)</option>
                                                        <option value="+39">IT (+39)</option>
                                                        <option value="+1876">JM (+1876)</option>
                                                        <option value="+81">JP (+81)</option>
                                                        <option value="+44">JE (+44)</option>
                                                        <option value="+962">JO (+962)</option>
                                                        <option value="+77">KZ (+77)</option>
                                                        <option value="+254">KE (+254)</option>
                                                        <option value="+686">KI (+686)</option>
                                                        <option value="+850">KP (+850)</option>
                                                        <option value="+82">KR (+82)</option>
                                                        <option value="+965">KW (+965)</option>
                                                        <option value="+996">KG (+996)</option>
                                                        <option value="+856">LA (+856)</option>
                                                        <option value="+371">LV (+371)</option>
                                                        <option value="+961">LB (+961)</option>
                                                        <option value="+266">LS (+266)</option>
                                                        <option value="+231">LR (+231)</option>
                                                        <option value="+218">LY (+218)</option>
                                                        <option value="+423">LI (+423)</option>
                                                        <option value="+370">LT (+370)</option>
                                                        <option value="+352">LU (+352)</option>
                                                        <option value="+853">MO (+853)</option>
                                                        <option value="+389">MK (+389)</option>
                                                        <option value="+261">MG (+261)</option>
                                                        <option value="+265">MW (+265)</option>
                                                        <option value="+60">MY (+60)</option>
                                                        <option value="+960">MV (+960)</option>
                                                        <option value="+223">ML (+223)</option>
                                                        <option value="+356">MT (+356)</option>
                                                        <option value="+692">MH (+692)</option>
                                                        <option value="+596">MQ (+596)</option>
                                                        <option value="+222">MR (+222)</option>
                                                        <option value="+230">MU (+230)</option>
                                                        <option value="+262">YT (+262)</option>
                                                        <option value="+52">MX (+52)</option>
                                                        <option value="+691">FM (+691)</option>
                                                        <option value="+373">MD (+373)</option>
                                                        <option value="+377">MC (+377)</option>
                                                        <option value="+976">MN (+976)</option>
                                                        <option value="+382">ME (+382)</option>
                                                        <option value="+1664">MS (+1664)</option>
                                                        <option value="+212">MA (+212)</option>
                                                        <option value="+258">MZ (+258)</option>
                                                        <option value="+95">MM (+95)</option>
                                                        <option value="+264">NA (+264)</option>
                                                        <option value="+674">NR (+674)</option>
                                                        <option value="+977">NP (+977)</option>
                                                        <option value="+31">NL (+31)</option>
                                                        <option value="+599">AN (+599)</option>
                                                        <option value="+687">NC (+687)</option>
                                                        <option value="+64">NZ (+64)</option>
                                                        <option value="+505">NI (+505)</option>
                                                        <option value="+227">NE (+227)</option>
                                                        <option value="+234">NG (+234)</option>
                                                        <option value="+683">NU (+683)</option>
                                                        <option value="+672">NF (+672)</option>
                                                        <option value="+1670">MP (+1670)</option>
                                                        <option value="+47">NO (+47)</option>
                                                        <option value="+968">OM (+968)</option>
                                                        <option value="+92">PK (+92)</option>
                                                        <option value="+680">PW (+680)</option>
                                                        <option value="+970">PS (+970)</option>
                                                        <option value="+507">PA (+507)</option>
                                                        <option value="+675">PG (+675)</option>
                                                        <option value="+595">PY (+595)</option>
                                                        <option value="+51">PE (+51)</option>
                                                        <option value="+63">PH (+63)</option>
                                                        <option value="+872">PN (+872)</option>
                                                        <option value="+48">PL (+48)</option>
                                                        <option value="+351">PT (+351)</option>
                                                        <option value="+1939">PR (+1939)</option>
                                                        <option value="+974">QA (+974)</option>
                                                        <option value="+40">RO (+40)</option>
                                                        <option value="+7">RU (+7)</option>
                                                        <option value="+250">RW (+250)</option>
                                                        <option value="+262">RE (+262)</option>
                                                        <option value="+590">BL (+590)</option>
                                                        <option value="+290">SH (+290)</option>
                                                        <option value="+1869">KN (+1869)</option>
                                                        <option value="+1758">LC (+1758)</option>
                                                        <option value="+590">MF (+590)</option>
                                                        <option value="+508">PM (+508)</option>
                                                        <option value="+1784">VC (+1784)</option>
                                                        <option value="+685">WS (+685)</option>
                                                        <option value="+378">SM (+378)</option>
                                                        <option value="+239">ST (+239)</option>
                                                        <option value="+966">SA (+966)</option>
                                                        <option value="+221">SN (+221)</option>
                                                        <option value="+381">RS (+381)</option>
                                                        <option value="+248">SC (+248)</option>
                                                        <option value="+232">SL (+232)</option>
                                                        <option value="+65">SG (+65)</option>
                                                        <option value="+421">SK (+421)</option>
                                                        <option value="+386">SI (+386)</option>
                                                        <option value="+677">SB (+677)</option>
                                                        <option value="+252">SO (+252)</option>
                                                        <option value="+27">ZA (+27)</option>
                                                        <option value="+211">SS (+211)</option>
                                                        <option value="+500">GS (+500)</option>
                                                        <option value="+34">ES (+34)</option>
                                                        <option value="+94">LK (+94)</option>
                                                        <option value="+249">SD (+249)</option>
                                                        <option value="+597">SR (+597)</option>
                                                        <option value="+47">SJ (+47)</option>
                                                        <option value="+268">SZ (+268)</option>
                                                        <option value="+46">SE (+46)</option>
                                                        <option value="+41">CH (+41)</option>
                                                        <option value="+963">SY (+963)</option>
                                                        <option value="+886">TW (+886)</option>
                                                        <option value="+992">TJ (+992)</option>
                                                        <option value="+255">TZ (+255)</option>
                                                        <option value="+66">TH (+66)</option>
                                                        <option value="+670">TL (+670)</option>
                                                        <option value="+228">TG (+228)</option>
                                                        <option value="+690">TK (+690)</option>
                                                        <option value="+676">TO (+676)</option>
                                                        <option value="+1868">TT (+1868)</option>
                                                        <option value="+216">TN (+216)</option>
                                                        <option value="+90">TR (+90)</option>
                                                        <option value="+993">TM (+993)</option>
                                                        <option value="+1649">TC (+1649)</option>
                                                        <option value="+688">TV (+688)</option>
                                                        <option value="+256">UG (+256)</option>
                                                        <option value="+380">UA (+380)</option>
                                                        <option value="+971">AE (+971)</option>
                                                        <option value="+44">GB (+44)</option>
                                                        <option value="+1">US (+1)</option>
                                                        <option value="+598">UY (+598)</option>
                                                        <option value="+998">UZ (+998)</option>
                                                        <option value="+678">VU (+678)</option>
                                                        <option value="+58">VE (+58)</option>
                                                        <option value="+84">VN (+84)</option>
                                                        <option value="+1284">VG (+1284)</option>
                                                        <option value="+1340">VI (+1340)</option>
                                                        <option value="+681">WF (+681)</option>
                                                        <option value="+967">YE (+967)</option>
                                                        <option value="+260">ZM (+260)</option>
                                                        <option value="+263">ZW (+263)</option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <input type="text" placeholder="Mobile number*"
                                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                                </div>
                                                <div>
                                                    <input type="text" placeholder="Passport no*"
                                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                                </div>

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
    const allSections = document.querySelectorAll('section');
    allSections.forEach((sec, idx) => {
        const numSpan = sec.querySelector('.section-number');
        if (numSpan) numSpan.innerText = idx + 1;
    });
}


// yes no flight booking
document.addEventListener('DOMContentLoaded', () => {
                                    const flightRadios = document.querySelectorAll(
                                        'input[name="flight-status"]');
                                    const flightInfo = document.getElementById('flight-info');

                                    function toggleFlightInfo() {
                                        if (document.querySelector('input[name="flight-status"]:checked')
                                            ?.value === 'booked') {
                                            flightInfo.style.display = 'block';
                                        } else {
                                            flightInfo.style.display = 'none';
                                        }
                                    }

                                    // Add event listeners
                                    flightRadios.forEach(radio => {
                                        radio.addEventListener('change', toggleFlightInfo);
                                    });
                                });
                                // specify
 document.addEventListener('DOMContentLoaded', () => {
    const findUsSelect = document.getElementById('find-us');
    const specifyInput = document.querySelector('.specify');

    findUsSelect.addEventListener('change', () => {
        specifyInput.style.display = findUsSelect.value === 'Others' ? 'block' : 'none';
    });
});

updateUI(); 

