Countdown Number Solver
=================

Spec:

>Use your initiative and solve it in the best way you think you can.
>
>The idea is to demonstrate your skills by building a small Laravel based web-based application which produces a target figure from a CSV file containing several numbers.
>
>Create a CSV with the following numbers: 3, 4, 8, 7, 12
>
>The target number is 532 but should be allowed to change.
>- You may only use (),+,-,*,/
>- You can use each symbol many times
>- You can only use each number once
>- You do not need to use all the numbers 

>The app must be able to handle the file upload and temporary storage of the CSV file.

>It must parse the CSV to extract the numbers.

>You need to build a processor to take the numbers and calculate the equation to the target number from them.
>When we come to test this, we will also use different numbers to check the process.

## Overview
Based on the above specification I surmised that the task was essentially to solve the number's round of the TV show Countdown.
This is a simple application that uses brute force to find the correct solutions by trying every combination of numbers and operations.

## Running

Run `docker-compose up` then visit `http://local.docker:8199`

## Tests

Run `docker-compose exec php vendor/bin/phpunit`

## Considerations
### Number generator
- I don't believe there's a mathematical formula for solving this problem, or at least not one I understand, so brute force was the only way I felt it was achievable.
- I decided to track my progress for each step in the $attempts array, as this was easier for me to debug, but it would have been less memory consuming to find another way.
- As a result of the above I increased the memory to 256mb to cater for 6 number inputs.
- I decided to return all possible answers to the problem, as I might use this in a family quiz at the weekend and I'll need to know all the right answers.
- I considered returning closest match solutions, but decided against this as it was out of scope of the specification, although I think it wouldn't be much work to achieve.

### Laravel
- Slightly older version than the latest available but it was an environment I had already prepared.
- My initial idea was to create an API containing the processor and contact that via Javascript, however for the size of the project it seems quite an expensive task for no technical benefit.
- I was going to use a library for parsing the CSV file, however in use case where the data isn't multidimensional I felt that it was less overhead to use explode() on the contents of the file.

### Gui
- Isn't particularly pretty.
- I will likely add text fields for the input to aid usability.