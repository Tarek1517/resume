$(document).ready(function () {
    function checkConfirm(e) {
        return;
        e.preventDefault();
        let conf = confirm("Ary sure to delete this!");
        if (conf) {
            return true;
        } else {
            return false;
        }
    }

    // open modal
    $(".btn-modal").on("click", function () {
        let aboutFeatures = $(this).attr("data-aboutFeatures");
        let features = JSON.parse(aboutFeatures);
        let tableBody = $(".show-modal-data");

        // Clear previous data
        tableBody.empty();

        if (!tableBody) return;

        // Make modal content data
        features.forEach(function (item, idx) {
            let tableRow = "";
            tableRow += "<tr>";
            tableRow += '<td class="align-middle">';
            tableRow += parseInt(idx + 1);
            tableRow += "</td>";
            tableRow += '<td class="align-middle">';
            tableRow += item.features_icon;
            tableRow += "</td>";
            tableRow += '<td class="align-middle">';
            tableRow += item.features_title;
            tableRow += "</td>";
            tableRow += '<td class="align-middle">';
            tableRow += item.features_description;
            tableRow += "</td>";
            tableRow += "</tr>";

            // Append table row here
            tableBody.append(tableRow);
        });
    });

    //add field

    $("#btn-Features").on("click", function () {
        var fieldIndex = 1;
        var inputDiv = `

                    <div class = "Feature-container">

                        <div class="remove-btn">

                        <button class="btn btn-outline-danger btn-sm mb-5 "><i class="fa-solid fa-xmark"></i></button>

                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Icon </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="features_icon" name="features_icon[]"
                                value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Feature Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="features_title"
                                    name="features_title[]" value="">
                               
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Feature Desc</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 100px" id="features_description" name="features_description[]"
                                    value=""></textarea>
                            </div>
                        </div>

                    </div>
            
            `;

        $("#moreFeatures").append(inputDiv);
        fieldIndex++;
    });

    $("#btn-CountFeatures").on("click", function () {
        var fieldIndex = 1;
        var inputDiv = `

        <div class = "Feature-container">

        <div class="remove-btn">

        <button class="btn btn-outline-danger btn-sm mb-5 "><i class="fa-solid fa-xmark"></i></button>

        </div>

                        <div class="row mb-3">

                            <label for="inputText" class="col-sm-2 col-form-label">Count Title</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="count_title" name="count_title[]"
                                    value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Count Sub Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="count_subTitle"
                                    name="count_subTitle[]" value="">
                            </div>
                        </div>

    </div>

`;

        $("#moreFeatures").append(inputDiv);
        fieldIndex++;
    });

    $("#moreFeatures").on("click", ".remove-btn", function () {
        $(this).parent(".Feature-container").remove();
    });

    $(".factBtn-modal").on("click", function () {
        let factFeatures = $(this).attr("data-FactFeatures");
        let features = JSON.parse(factFeatures);
        let tableBody = $(".show-modal-data");

        // Clear previous data
        tableBody.empty();

        if (!tableBody) return;

        // Make modal content data
        features.forEach(function (item, idx) {
            let tableRow = "";
            tableRow += "<tr>";
            tableRow += '<td class="align-middle">';
            tableRow += parseInt(idx + 1);
            tableRow += "</td>";
            tableRow += '<td class="align-middle">';
            tableRow += item.count_title;
            tableRow += "</td>";
            tableRow += '<td class="align-middle">';
            tableRow += item.count_subTitle;
            tableRow += "</td>";

            tableRow += "</tr>";

            // Append table row here
            tableBody.append(tableRow);
        });
    });

    //modal for service

    $(".servicebtn-modal").on("click", function () {
        let serviceFeatures = $(this).attr("data-serviceFeatures");
        let features = JSON.parse(serviceFeatures);
        let tableBody = $(".show-modal-data");

        // Clear previous data
        tableBody.empty();

        if (!tableBody) return;

        // Make modal content data
        features.forEach(function (item, idx) {
            let tableRow = "";
            tableRow += "<tr>";
            tableRow += '<td class="align-middle">';
            tableRow += parseInt(idx + 1);
            tableRow += "</td>";
            tableRow += '<td class="align-middle">';
            tableRow += item.features_icon;
            tableRow += "</td>";
            tableRow += '<td class="align-middle">';
            tableRow += item.features_title;
            tableRow += "</td>";
            tableRow += '<td class="align-middle">';
            tableRow += item.features_description;
            tableRow += "</td>";
            tableRow += "</tr>";

            // Append table row here
            tableBody.append(tableRow);
        });
    });

    $(".js-example-basic-multiple").select2();

    $("#name").keyup(function () {
        var value = $(this).val();
        $("#Slug").val(value);

        let formattedVal = value.replace(/\s+/g, "_").toLowerCase();
        $("#Slug").val(formattedVal);
    });

    $('.messagebtn-Modal').on('click', function() {
        let contactMessage = $(this).attr('data-message');
        let tableBody = $('.show-modal-data');
    
        // Clear any existing content in the table body
        tableBody.empty();
    
        // Check if the contactMessage is valid JSON
        try {
            let messages = JSON.parse(contactMessage);
    
            // If it's an array, iterate and display each message
            if (Array.isArray(messages)) {
                messages.forEach(function(message) {
                    tableBody.append('<tr><td>' + message + '</td></tr>');
                });
            } else {
                // If it's a single message (not an array)
                tableBody.append('<tr><td>' + messages + '</td></tr>');
            }
        } catch (e) {
            // If it's not JSON, treat it as a simple string
            tableBody.append('<tr><td>' + contactMessage + '</td></tr>');
        }
    });

    
});


