<!DOCTYPE html>
<html lang="en">
<head>
    <title>test</title>
</head>
<body>
<form>
    <select id="my-select">
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
    </select>
    <div id="option1-content" style="display:none;">
        Content for option 1
    </div>
    <div id="option2-content" style="display:none;">
        Content for option 2
    </div>
    <div id="option3-content" style="display:none;">
        Content for option 3
    </div>
</form>

<script>
    const select = document.getElementById("my-select");
    select.addEventListener("change", function() {
        let selectedOption = this.value;
        switch (selectedOption) {
            case "option1":
                document.getElementById("option1-content").style.display = "block";
                document.getElementById("option2-content").style.display = "none";
                document.getElementById("option3-content").style.display = "none";
                break;
            case "option2":
                document.getElementById("option1-content").style.display = "none";
                document.getElementById("option2-content").style.display = "block";
                document.getElementById("option3-content").style.display = "none";
                break;
            case "option3":
                document.getElementById("option1-content").style.display = "none";
                document.getElementById("option2-content").style.display = "none";
                document.getElementById("option3-content").style.display = "block";
                break;
        }
    });


</script>
    <div id='DivReqDetails'></div>

</body>
</html>