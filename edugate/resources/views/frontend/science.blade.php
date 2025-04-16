<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('common.header')
<div class="container m-5">
        <h2 class="mb-4">Multiple Choice Questions</h2>
        
        <!-- Question 1 -->
        <div class="mb-4">
            <h5>1. What is the capital of France?</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question1" id="q1a" value="Paris">
                <label class="form-check-label" for="q1a">
                    Paris
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question1" id="q1b" value="London">
                <label class="form-check-label" for="q1b">
                    London
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question1" id="q1c" value="Berlin">
                <label class="form-check-label" for="q1c">
                    Berlin
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question1" id="q1d" value="Rome">
                <label class="form-check-label" for="q1d">
                    Rome
                </label>
            </div>
        </div>
        
        <!-- Question 2 -->
        <div class="mb-4">
            <h5>2. Which planet is known as the Red Planet?</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question2" id="q2a" value="Mars">
                <label class="form-check-label" for="q2a">
                    Mars
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question2" id="q2b" value="Jupiter">
                <label class="form-check-label" for="q2b">
                    Jupiter
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question2" id="q2c" value="Saturn">
                <label class="form-check-label" for="q2c">
                    Saturn
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question2" id="q2d" value="Venus">
                <label class="form-check-label" for="q2d">
                    Venus
                </label>
            </div>
        </div>
        
        <!-- Question 3 -->
        <div class="mb-4">
            <h5>3. Who wrote 'Hamlet'?</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question3" id="q3a" value="Shakespeare">
                <label class="form-check-label" for="q3a">
                    William Shakespeare
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question3" id="q3b" value="Dickens">
                <label class="form-check-label" for="q3b">
                    Charles Dickens
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question3" id="q3c" value="Austen">
                <label class="form-check-label" for="q3c">
                    Jane Austen
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question3" id="q3d" value="Hemingway">
                <label class="form-check-label" for="q3d">
                    Ernest Hemingway
                </label>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    @include('common.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

