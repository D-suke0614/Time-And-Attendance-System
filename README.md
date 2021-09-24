# コーディングルール
## GIT関連
### 中央ブランチ
- master 現在のgithubのバージョン
- deploy 現在の公開中のバージョン（リリース時以外触らない）

### 開発用ブランチ
- feature/brunch_name 新規機能の開発用。
    - masterからブランチを切り、masterにマージする。
- refactor/brunch_name リファクタリング用。
    - masterからブランチを切り、master → deployとマージする。（アップデートの開発前に行う）
- fix/brunch_name 開発中にバグやエラーなどで対応する必要のある場合。（masterにマージ後エラーが発覚した場合など）
    - masterから分岐し、masterにマージする。
- hotfix/brunch_name リリース後にエラーやバグなどで対応する必要のある場合。
    - masterから分岐し、master → deployとマージする。
<br>
 ※ブランチ名は単語ごとに_で繋げる<br>
 例：feature/slack_connection
 
 ### PRが出た時
 - ２人以上からLGTMをもらえたらマージしてOK
 - 確認する人は、ローカルに持ってきて、きちんと動作確認すること
 
 ## ファイル関連
 - ファイル名はキャメルケースで表記する<br>
例：TiemList.blade.php
 - 変数名、クラス名、関数名などは適宜動詞などを用いて、なるだけ何の変数かわかりやすい名前にする<br>
例：getWorkTime, pushAttendanceButton
 - 共通の見た目に関しては、app.cssのものを使用する
