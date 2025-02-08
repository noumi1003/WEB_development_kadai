from flask import Flask, render_template, request, redirect, flash
from werkzeug.security import generate_password_hash, check_password_hash
import sqlite3

app = Flask(__name__)
app.secret_key = 'your_secret_key'

# データベース接続とテーブル作成
def init_db():
    conn = sqlite3.connect('users.db')
    conn.execute('CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, username TEXT UNIQUE, password TEXT)')
    conn.close()

init_db()

@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        hashed_password = generate_password_hash(password)

        with sqlite3.connect('users.db') as conn:
            try:
                conn.execute('INSERT INTO users (username, password) VALUES (?, ?)', (username, hashed_password))
                flash('登録が成功しました！')
                return redirect('/login')
            except sqlite3.IntegrityError:
                flash('ユーザー名が既に使用されています。')

    return '''
    <form method="post">
        <input type="text" name="username" placeholder="ユーザー名" required><br>
        <input type="password" name="password" placeholder="パスワード" required><br>
        <input type="submit" value="登録">
    </form>
    '''

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        with sqlite3.connect('users.db') as conn:
            user = conn.execute('SELECT * FROM users WHERE username = ?', (username,)).fetchone()

            if user and check_password_hash(user[2], password):
                flash('ログイン成功！ようこそ、{}さん。'.format(username))
            else:
                flash('ユーザー名またはパスワードが間違っています。')

    return '''
    <form method="post">
        <input type="text" name="username" placeholder="ユーザー名" required><br>
        <input type="password" name="password" placeholder="パスワード" required><br>
        <input type="submit" value="ログイン">
    </form>
    '''

@app.route('/')
def home():
    return """<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome Home!</h1>
    <a href="/login">Login</a>
    <a href="/register">Register</a>
</body>
</html>"""

if __name__ == '__main__':
    app.run(debug=True)