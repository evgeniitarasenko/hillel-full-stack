Типи опитувань, повинні включати в себе набір питань з визначенними типами.
Опитування, будуть включати в себе відповіді на певний тип опитування

poll_types
    - id
    - name

poll_types_questions
    - id
    - poll_type_id (poll_types.id)
    - type
    - question (varchar)
    - is_required

polls
    - id
    - owner (varchar)
    - poll_type_id

poll_answers
    - id
    - poll_id
    - question_id (poll_types_questions.id)
    - answer (text)




-  Як вам 2023 poll_type
  - Оцініть гудень: TEXT, REQUITED poll_question
  - Оцініть вересень: TEXT, REQUITED
  - поставе оцінку : радіобаттон 0-10



- Евген завовнив опитування  Як вам 2023 poll
  - poll_answers: id1, answer:супер  poll_id: 1, question_id: 1
  - не дуже
  - 7

- Егор завовнив опитування  Як вам 2023
    - не дуже
    - супер
    - 5