<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Bài kiểm tra</title>


</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <style>
html, body{
    height: 100%;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: 'Montserrat', serif;

}

main{
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: black;
    background: url('../assets/background_image.jpg');
    background-color : rgb(204, 226, 255);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

.game-quiz-container{
    width: 40rem;
    height: 30rem;
    background-color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
    border-radius: 30px;
}

.game-details-container{
    width: 80%;
    height: 4rem;
    display: flex;
    justify-content: space-around;
    align-items: center;
}

.game-details-container h1{
    font-size: 1.2rem;
}

.game-question-container{
    width: 80%;
    height: 8rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid darkgray;
    border-radius: 25px;
}

.game-question-container h1{
    font-size: 1.1rem;
    text-align: center;
    padding: 3px;
}

.game-options-container{
    width: 80%;
    height: 12rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-around;
}

.game-options-container span{
    width: 45%;
    height: 3rem;
    border: 2px solid darkgray;
    border-radius: 20px;
    overflow: hidden;
}
span label{
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: transform 0.3s;
    font-weight: 600;
    color: rgb(22, 22, 22);
}

span label:hover{
    -ms-transform: scale(1.12);
    -webkit-transform: scale(1.12);
    transform: scale(1.12);
    color: black;
}

input[type="radio"] {
    position: relative;
    display: none;
}

input[type=radio]:checked ~ .option {
background: paleturquoise;
}

.next-button-container{
    width: 50%;
    height: 3rem;
    display: flex;
    justify-content: center;
}
.next-button-container button{
    width: 8rem;
    height: 2rem;
    border-radius: 10px;
    background: none;
    color: rgb(25, 25, 25);
    font-weight: 600;
    border: 2px solid gray;
    cursor: pointer;
    outline: none;
}
.next-button-container button:hover{
    background-color: rgb(255, 204, 209);
}

.modal-container{
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    flex-direction: column;
    align-items: center;
    justify-content: center;
    -webkit-animation: fadeIn 1.2s ease-in-out;
    animation: fadeIn 1.2s ease-in-out;
}

.modal-content-container{
    height: 20rem;
    width: 25rem;
    background-color: rgb(43, 42, 42);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
    border-radius: 25px;
}

.modal-content-container h1{
    font-size: 1.3rem;
    height: 3rem;
    color: lightgray;
    text-align: center;
}

.grade-details{
    width: 15rem;
    height: 10rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
}

.grade-details p{
    color: white;
    text-align: center;
}

.modal-button-container{
    height: 2rem;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-button-container button{
    width: 10rem;
    height: 2rem;
    background: none;
    outline: none;
    border: 1px solid rgb(252, 242, 241);
    color: white;
    font-size: 1.1rem;
    cursor: pointer;
    border-radius: 20px;
}
.modal-button-container button:hover{
    background-color: rgb(83, 82, 82);
}

@media(min-width : 300px) and (max-width : 350px){
    .game-quiz-container{
        width: 90%;
        height: 80vh;
     }
     .game-details-container h1{
        font-size: 0.8rem;
     }

     .game-question-container{
        height: 6rem;
     }
     .game-question-container h1{
       font-size: 0.9rem;
    }

    .game-options-container span{
        width: 90%;
        height: 2.5rem;
    }
    .game-options-container span label{
        font-size: 0.8rem;
    }
    .modal-content-container{
        width: 90%;
        height: 25rem;
    }

    .modal-content-container h1{
        font-size: 1.2rem;
    }
}

@media(min-width : 350px) and (max-width : 700px){
   .game-quiz-container{
       width: 90%;
       height: 80vh;
    }
    .game-details-container h1{
        font-size: 1rem;
    }

    .game-question-container{
        height: 8rem;
    }

    .game-question-container h1{
        font-size: 0.9rem;
     }

    .game-options-container span{
        width: 90%;
    }
    .modal-content-container{
        width: 90%;
        height: 25rem;
    }
    .modal-content-container h1{
        font-size: 1.2rem;
    }
}


@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
  }

  @-webkit-keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
  }
</style>

    <main>
        <!-- creating a modal for when quiz ends -->
        <div class="modal-container" id="score-modal">

            <div class="modal-content-container">

                <h1>Tổng kết bài kiểm tra.</h1>

                <div class="grade-details">
                    <p>Số câu sai : <span id="wrong-answers"></span></p>
                    <p>Số câu đúng : <span id="right-answers"></span></p>
                    <p>Xếp hạng : <span id="grade-percentage"></span>%</p>
                    <p ><span id="remarks"></span></p>
                </div>

                <div class="modal-button-container">
                    <div class="modal-button-container">
                        <button onclick="tai_lai_trang()">Kiểm tra lại</button>
                    </div>
                </div>

            </div>
        </div>
        @foreach ($exam as $key => $value1)
        <h1>{{$value1->tenbaitest}}</h1>
        <div class="game-quiz-container">

            <div class="game-details-container">
                <h1>Số câu đúng : <span id="player-score"></span> / 10</h1>
                <h1> Câu hiện tại : <span id="question-number"></span> / 10</h1>
            </div>
            @endforeach
            {{-- @foreach ($question as $key => $value2) --}}
            <div class="game-question-container">
                <h1 id="display-question"></h1>
            </div>
            <div class="game-options-container">

               <div class="modal-container" id="option-modal">

                    <div class="modal-content-container">
                         <h1>Bạn chưa chọn đáp án, vui lòng chọn lại!</h1>

                         <div class="modal-button-container">
                            <button onclick="closeOptionModal()">Trở về</button>
                        </div>

                    </div>

               </div>

                <span>
                    <input type="radio" id="option-one" name="option" class="radio" value="optionA" />
                    <label for="option-one" class="option" id="option-one-label"></label>
                </span>


                <span>
                    <input type="radio" id="option-two" name="option" class="radio" value="optionB" />
                    <label for="option-two" class="option" id="option-two-label"></label>
                </span>


                <span>
                    <input type="radio" id="option-three" name="option" class="radio" value="optionC" />
                    <label for="option-three" class="option" id="option-three-label"></label>
                </span>


                <span>
                    <input type="radio" id="option-four" name="option" class="radio" value="optionD" />
                    <label for="option-four" class="option" id="option-four-label"></label>
                </span>

            </div>

            {{-- @endforeach --}}
            <div class="next-button-container">
                <button onclick="handleNextQuestion()">Tiếp theo</button>
            </div>

        </div>
    </main>
     <script>
    const questions = [
    {
        question: "Thuộc tính HTML nào xác định một văn bản sẽ dùng thay thế cho hình ảnh, nếu hình ảnh không thể được hiển thị?",
        optionA: "alt",
        optionB: "src",
        optionC: "title",
        optionD: "longdesc",
        correctOption: "optionA"
    },

    {
        question: "Tính năng… HTML sẽ xử lý định dạng nội dung text và chuyển thành mã HTML",
        optionA: "Browser",
        optionB: "Editor",
        optionC: "Converter",
        optionD: "Processor",
        correctOption: "optionC"
    },

    {
        question: "Hiện tại có tất cả… mã màu có thể được nhận dạng bởi tất cả các phiên bản HTML",
        optionA: "6",
        optionB: "8",
        optionC: "256",
        optionD: "16",
        correctOption: "optionD"
    },

    {
        question: "Phương án nào sau đây là tag 2 side",
        optionA: "DT",
        optionB: "LI",
        optionC: "DD",
        optionD: "DL",
        correctOption: "optionD"
    },

    {
        question: "Ký tự nào dùng để kết thúc một thẻ trong HTML?",
        optionA: "<",
        optionB: "^",
        optionC: "*",
        optionD: "/",
        correctOption: "optionD"
    },

    {
        question: "Các trình duyệt thường áp dụng tính năng của toàn bộ tag cho tới phần tag…",
        optionA: "Quit",
        optionB: "Closing",
        optionC: "Exit",
        optionD: "Anti",
        correctOption: "optionB"
    },

    {
        question: " … là đoạn mã HTML có chức năng kiểm soát quá trình hiển thị của nội dung văn bản",
        optionA: "Tags",
        optionB: "Codas",
        optionC: "Slashes",
        optionD: "Properties",
        correctOption: "optionA"
    },

    {
        question: "Cú pháp chung của đường dẫn ảnh trực tiếp",
        optionA: "src=img",
        optionB: "src=image",
        optionC: "img=file",
        optionD: "img src=file",
        correctOption: "optionD"
    },

    {
        question: "Để tạo đường dẫn kết nối tới các anchor, chúng ta sẽ phải dùng thuộc tính… trong tag",
        optionA: "Name",
        optionB: "Tag",
        optionC: "Link",
        optionD: "Href",
        correctOption: "optionD"
    },

    {
        question: "Cấu trúc tag của inline frame là gì?",
        optionA: "iframe",
        optionB: "inframe",
        optionC: "frame",
        optionD: "inlineframe",
        correctOption: "optionA"
    },

    {
        question: "Ngôn ngữ nào được sử dụng phổ biến nhất để tạo form email",
        optionA: "ASP",
        optionB: "PHP",
        optionC: "Perl CGI",
        optionD: "JSP",
        correctOption: "optionB"
    }

]

let shuffledQuestions = [] //empty array to hold shuffled selected questions

function handleQuestions() {
    //function to shuffle and push 10 questions to shuffledQuestions array
    while (shuffledQuestions.length <= 9) {
        const random = questions[Math.floor(Math.random() * questions.length)]
        if (!shuffledQuestions.includes(random)) {
            shuffledQuestions.push(random)
        }
    }
}

questions.forEach(item =>{
    const a = document.getElementById('display-question')
    a.innerText = 'aaaaa'
})


let questionNumber = 1
let playerScore = 0
let wrongAttempt = 0
let indexNumber = 0

// function for displaying next question in the array to dom
function NextQuestion(index) {
    handleQuestions()
    const currentQuestion = shuffledQuestions[index]
    document.getElementById("question-number").innerHTML = questionNumber
    document.getElementById("player-score").innerHTML = playerScore
    document.getElementById("display-question").innerHTML = currentQuestion.question;
    document.getElementById("option-one-label").innerHTML = currentQuestion.optionA;
    document.getElementById("option-two-label").innerHTML = currentQuestion.optionB;
    document.getElementById("option-three-label").innerHTML = currentQuestion.optionC;
    document.getElementById("option-four-label").innerHTML = currentQuestion.optionD;

}

function checkForAnswer() {
    const currentQuestion = shuffledQuestions[indexNumber] //gets current Question
    const currentQuestionAnswer = currentQuestion.correctOption //gets current Question's answer
    const options = document.getElementsByName("option"); //gets all elements in dom with name of 'option' (in this the radio inputs)
    let correctOption = null

    options.forEach((option) => {
        if (option.value === currentQuestionAnswer) {
            //get's correct's radio input with correct answer
            correctOption = option.labels[0].id
        }
    })

    //checking to make sure a radio input has been checked or an option being chosen
    if (options[0].checked === false && options[1].checked === false && options[2].checked === false && options[3].checked == false) {
        document.getElementById('option-modal').style.display = "flex"
    }

    //checking if checked radio button is same as answer
    options.forEach((option) => {
        if (option.checked === true && option.value === currentQuestionAnswer) {
            document.getElementById(correctOption).style.backgroundColor = "rgb(204, 255, 204)"
            playerScore++
            indexNumber++
            //set to delay question number till when next question loads
            setTimeout(() => {
                questionNumber++
            }, 1000)
        }

        else if (option.checked && option.value !== currentQuestionAnswer) {
            const wrongLabelId = option.labels[0].id
            document.getElementById(wrongLabelId).style.backgroundColor = "rgb(255, 153, 153)"
            document.getElementById(correctOption).style.backgroundColor = "rgb(204, 255, 204)"
            wrongAttempt++
            indexNumber++
            //set to delay question number till when next question loads
            setTimeout(() => {
                questionNumber++
            }, 1000)
        }
    })
}


//called when the next button is called
function handleNextQuestion() {
    checkForAnswer()
    unCheckRadioButtons()
    //delays next question displaying for a second
    setTimeout(() => {
        if (indexNumber <= 9) {
            NextQuestion(indexNumber)
        }
        else {
            handleEndGame()
        }
        resetOptionBackground()
    }, 1000);
}

//sets options background back to null after display the right/wrong colors
function resetOptionBackground() {
    const options = document.getElementsByName("option");
    options.forEach((option) => {
        document.getElementById(option.labels[0].id).style.backgroundColor = ""
    })
}

// unchecking all radio buttons for next question(can be done with map or foreach loop also)
function unCheckRadioButtons() {
    const options = document.getElementsByName("option");
    for (let i = 0; i < options.length; i++) {
        options[i].checked = false;
    }
}

// function for when all questions being answered
function handleEndGame() {
    let remark = null
    let remarkColor = null

    // condition check for player remark and remark color
    if (playerScore <= 3) {
        remark = "Kết quả của bạn quá thấp, vui lòng ôn tập lại kiến thức!"
        remarkColor = "rgb(241, 14, 46)"
    }
    else if (playerScore >= 4 && playerScore < 7) {
        remark = "Kết quả của bạn ở mức trung bình, hy vọng bạn đạt kết quả cao hơn trong lần tới!"
        remarkColor = "rgb(255, 177, 42)"
    }
    else if (playerScore >= 7) {
        remark = "Bạn đã hoàn thành xuất sắc bài kiểm tra!"
        remarkColor = "rgb(10, 186, 127)"
    }
    const playerGrade = (playerScore / 10) * 100

    //data to display to score board
    document.getElementById('remarks').innerHTML = remark
    document.getElementById('remarks').style.color = remarkColor
    document.getElementById('grade-percentage').innerHTML = playerGrade
    document.getElementById('wrong-answers').innerHTML = wrongAttempt
    document.getElementById('right-answers').innerHTML = playerScore
    document.getElementById('score-modal').style.display = "flex"

}

//closes score modal and resets game
function closeScoreModal() {
    questionNumber = 1
    playerScore = 0
    wrongAttempt = 0
    indexNumber = 0
    shuffledQuestions = []
    NextQuestion(indexNumber)
    document.getElementById('score-modal').style.display = "none"
}

//function to close warning modal
function closeOptionModal() {
    document.getElementById('option-modal').style.display = "none"
}
    function tai_lai_trang(){
            location.reload();
        }
  </script>
  <script>
    NextQuestion(0);
  </script>
</body>
<!-- partial -->

</body>
</html>
