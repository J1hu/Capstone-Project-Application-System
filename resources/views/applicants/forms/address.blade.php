<x-form-layout>
    {{-- Home Address --}}
    <div class="my-20">
        <div class="font-bold text-lg">Home Address</div>
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="region" class="text-sm text-slate-700">Region<span class="text-red-500"> *</span></label>
                <select id="region" name="region" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                    <option value="">Select Region</option>
                </select>
                @if ($errors->has('region'))
                <div class="invalid-feedback text-red-500">
                    {{ $errors->first('region') }}
                </div>
                @endif
            </div>

            <div>
                <label for="province" class="text-sm text-slate-700">Province Address<span class="text-red-500"> *</span></label>
                <select id="province" name="province" required disabled class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                    <option value="">Select Province</option>
                </select>
                @if ($errors->has('province'))
                <div class="invalid-feedback text-red-500">
                    {{ $errors->first('province') }}
                </div>
                @endif
            </div>

            <div>
                <label for="city_municipality" class="text-sm text-slate-700">City or Municipality<span class="text-red-500"> *</span></label>
                <select id="city_municipality" name="city_municipality" required disabled class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                    <option value="">Select Municipality</option>
                </select>
                @if ($errors->has('city_municipality'))
                <div class="invalid-feedback text-red-500">
                    {{ $errors->first('city_municipality') }}
                </div>
                @endif
            </div>

            <div>
                <label for="barangay" class="text-sm text-slate-700">Barangay<span class="text-red-500"> *</span></label>
                <select id="barangay" name="barangay" required disabled class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                    <option value="">Select Barangay</option>
                </select>
                @if ($errors->has('barangay'))
                <div class="invalid-feedback text-red-500">
                    {{ $errors->first('barangay') }}
                </div>
                @endif
            </div>
            <div>
                <label for="street" class="text-sm text-slate-700">Street<span class="text-red-500"> *</span></label>
                <input type="text" id="street" name="street" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                @if ($errors->has('street'))
                <div class="invalid-feedback text-red-500">
                    {{ $errors->first('street') }}
                </div>
                @endif
            </div>
            <div>
                <label for="zip_code" class="text-sm text-slate-700">Zip Code<span class="text-red-500"> *</span></label>
                <input type="text" id="zip_code" name="zip_code" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                @if ($errors->has('zip_code'))
                <div class="invalid-feedback text-red-500">
                    {{ $errors->first('zip_code') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-form-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Load regions on page load
        loadRegions();

        // Handle region selection change event
        $('#region').on('change', function() {
            var regionId = $(this).val();

            if (regionId) {
                // Enable and load provinces based on the selected region
                loadProvinces(regionId);
            } else {
                // Reset and disable province, municipality, and barangay dropdowns
                resetDropdown('#province');
                resetDropdown('#city_municipality');
                resetDropdown('#barangay');
            }
        });

        // Handle province selection change event
        $('#province').on('change', function() {
            var provinceId = $(this).val();

            if (provinceId) {
                // Enable and load municipalities based on the selected province
                loadMunicipalities(provinceId);
            } else {
                // Reset and disable municipality and barangay dropdowns
                resetDropdown('#city_municipality');
                resetDropdown('#barangay');
            }
        });

        // Handle municipality selection change event
        $('#city_municipality').on('change', function() {
            var municipalityId = $(this).val();

            if (municipalityId) {
                // Enable and load barangays based on the selected municipality
                loadBarangays(municipalityId);
            } else {
                // Reset and disable barangay dropdown
                resetDropdown('#barangay');
            }
        });

        function loadRegions() {
            // Make an AJAX request to fetch the regions
            $.ajax({
                url: '/regions', // Replace with your Laravel route for fetching regions
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the region dropdown with options
                    populateDropdown('#region', data);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function loadProvinces(regionId) {
            // Make an AJAX request to fetch the provinces based on the selected region
            $.ajax({
                url: '/provinces/' + regionId, // Replace with your Laravel route for fetching provinces by region
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the province dropdown with options
                    populateDropdown('#province', data);

                    // Enable the province dropdown
                    enableDropdown('#province');

                    // Reset and disable municipality and barangay dropdowns
                    resetDropdown('#city_municipality');
                    resetDropdown('#barangay');
                    disableDropdown('#city_municipality');
                    disableDropdown('#barangay');
                },
                error: function(xhr, status, error) {
                    // Handle the error case if the AJAX request fails
                    console.error(error);
                }
            });
        }

        function loadMunicipalities(provinceId) {
            // Make an AJAX request to fetch the municipalities based on the selected province
            $.ajax({
                url: '/municipalities/' + provinceId, // Replace with your Laravel route for fetching municipalities by province
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the city_municipality dropdown with options
                    populateDropdown('#city_municipality', data);

                    // Enable the city_municipality dropdown
                    enableDropdown('#city_municipality');

                    // Reset and disable barangay dropdown
                    resetDropdown('#barangay');
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function loadBarangays(municipalityId) {
            // Make an AJAX request to fetch the barangays based on the selected municipality
            $.ajax({
                url: '/barangays/' + municipalityId, // Replace with your Laravel route for fetching barangays by municipality
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the barangay dropdown with options
                    populateDropdown('#barangay', data);

                    // Enable the barangay dropdown
                    enableDropdown('#barangay');
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function populateDropdown(selector, data) {
            var dropdown = $(selector);

            // Clear existing options
            dropdown.empty();

            // Add a default option
            dropdown.append('<option value="">Select...</option>');

            // Add options from the data
            $.each(data, function(index, item) {
                dropdown.append('<option value="' + item.id + '">' + item.name + '</option>');
            });
        }

        function enableDropdown(selector) {
            $(selector).prop('disabled', false);
        }

        function resetDropdown(selector) {
            $(selector).empty().prop('disabled', true);
        }
    });
</script>