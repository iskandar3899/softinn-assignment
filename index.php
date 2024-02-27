<html>

<head>
    <style>
        body {
            background-color: rgb(21, 27, 36);
        }

        #container {
            margin: auto;
            padding: 30px;
            width: 50%;
            height: 50%;
            background-color: rgb(27, 34, 45);
            color: #fff;
            min-width: 500px;
            min-height: 500px;
            max-width: 700px;
            max-height: 700px;
        }

        #options-buttons {
            width: 100%;
            display: flex;
        }

        .button-change-question {
            width: 100%;
        }

        .answer-container {
            margin-top: 110px;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div id="container">
        <div id="options-buttons">
            <button id="question1" class="button-change-question">Question 1</button>
            <button id="question2" class="button-change-question">Question 2</button>
            <button id="question3" class="button-change-question">Question 3</button>
        </div>
        <div id="sub-container">

        </div>
    </div>
</body>
<footer>
    <script>
        $(document).ready(function() {
            const optionsButtons = $("#options-buttons");
            const subContainer = $("#sub-container");

            function question1() {
                function render() {
                    let container1 = `
                    <div id="container1">
                        <h2 class="title">Question 1</h2>
                        <input type="text" id="text-box-question1" class="text-box">
                        <div class="button-submit">
                            <button id="button-question1" class="button-answer">Submit</button>
                        </div>
                        <div class="answer-container">
                            <h3>Answers</h3>
                            <div id="answer-displayed"></div>
                        </div>
                    </div>`;

                    subContainer.append(container1);
                }
                render();

                subContainer.find("#button-question1").on("click", function() {
                    let value = subContainer.find("#text-box-question1").val();

                    function changeLetters(str) {
                        let converted = [];
                        // Loop through each character in the string
                        for (let i = 0; i < str.length; i++) {
                            let charCode = str.charCodeAt(i);
                            // Check if the character is a lowercase letter
                            if (charCode >= 97 && charCode <= 122) {
                                charCode = ((charCode - 97 + 1) % 26) + 97;
                            }
                            // Check if the character is an uppercase letter
                            else if (charCode >= 65 && charCode <= 90) {
                                charCode = ((charCode - 65 + 1) % 26) + 65;
                            }
                            converted.push(String.fromCharCode(charCode));
                        }
                        subContainer.find("#answer-displayed").html(converted);
                    }

                    changeLetters(value);
                });
            }

            function question2() {
                function render() {
                    let container2 = `
                    <div id="container2">
                        <h2 class="title">Question 2</h2>
                        <input type="text" id="text-box-question2-first" class="text-box">
                        <input type="text" id="text-box-question2-second" class="text-box">
                        <div class="button-submit">
                            <button id="button-question2" class="button-answer">Submit</button>
                        </div>
                        <div class="answer-container">
                            <h3>Answers</h3>
                            <div id="answer-displayed"></div>
                        </div>
                    </div>`;

                    subContainer.append(container2);
                }
                render();

                subContainer.find("#button-question2").on("click", function() {
                    let value1 = subContainer.find("#text-box-question2-first").val();
                    let value2 = subContainer.find("#text-box-question2-second").val();
                    let returnResult;

                    function lettersPresent(val1, val2) {
                        const str1 = val1.toLowerCase();
                        const str2 = val2.toLowerCase();

                        for (let i = 0; i < str2.length; i++) {
                            if (str1.indexOf(str2[i]) === -1) {
                                return false;
                                console.log("not found");
                            }
                        }
                        return true;
                    }

                    returnResult = lettersPresent(value1, value2);
                    subContainer.find("#answer-displayed").html(returnResult);
                });
            }

            optionsButtons.find("#question1").on("click", function() {
                if (subContainer.find("#container1").length === 0) {
                    subContainer.empty();
                    question1();
                }
            });

            optionsButtons.find("#question2").on("click", function() {
                if (subContainer.find("#container2").length === 0) {
                    subContainer.empty();
                    question2();
                }
            });


        });
    </script>
</footer>

</html>