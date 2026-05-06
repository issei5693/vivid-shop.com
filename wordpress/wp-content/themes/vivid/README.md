# vivid テーマ 開発手順

## サーバー SSH 接続

### 初回セットアップ

1. **秘密鍵をSSHディレクトリにコピー**（プロジェクトルートの `id_rsa` を使用）

   ```bash
   cp id_rsa ~/.ssh/id_rsa_vivid
   chmod 600 ~/.ssh/id_rsa_vivid
   ```

2. **`~/.ssh/config` に以下を追記**

   ```
   Host colorme
     HostName 183.90.183.152
     User qqlnlljh
     IdentityFile ~/.ssh/id_rsa_vivid
     ServerAliveInterval 60
   ```

### 接続方法

```bash
ssh colorme
```

パスフレーズを求められたら入力してください（`ssh_credentials.txt` を参照）。

> **注意:** `id_rsa` および `ssh_credentials.txt` は `.gitignore` で除外されています。  
> これらのファイルはリポジトリにコミットせず、別途チームメンバーに共有してください。

---

## 動作要件

| ソフトウェア | バージョン |
|---|---|
| Node.js | v16 以上（動作確認済み: v24.13.1） |
| npm | v8 以上（動作確認済み: v11.8.0） |

## 使用ツール・パッケージ

| パッケージ | 用途 |
|---|---|
| gulp 4 | タスクランナー（ファイル監視・自動処理） |
| gulp-sass + sass | Sass（SCSS）を CSS にコンパイル |
| gulp-autoprefixer | ベンダープレフィックスの自動付与 |
| gulp-sourcemaps | ソースマップの生成 |

## セットアップ

```bash
cd wordpress/wp-content/themes/vivid
npm install
```

## 開発サーバーの起動

```bash
cd wordpress/wp-content/themes/vivid
npm run gulp
```

起動後は `sass/` 配下のファイルを監視し、変更を検知すると自動で `style.css` を再生成します。  
終了するには `Ctrl+C` を押してください。

## Sass ディレクトリ構成

```
sass/
├── Foundation/   # リセット・変数・ミックスインなど
├── Layout/       # ヘッダー・フッター等のレイアウト
├── Object/       # コンポーネント・プロジェクト単位のスタイル
└── style.scss    # エントリーポイント（各ファイルを @import）
```

編集するのは `Foundation/`・`Layout/`・`Object/` 配下のファイルです。  
`style.scss` は各ファイルを束ねるエントリーポイントのため、基本的に直接編集しません。

## ビルド成果物

| ファイル | 内容 |
|---|---|
| `style.css` | コンパイル済み CSS（圧縮形式） |
| `style.css.map` | ソースマップ（デバッグ用） |

## 注意事項

- `npm run gulp` は必ず `wordpress/wp-content/themes/vivid/` ディレクトリ内で実行してください。プロジェクトルートから実行するとエラーになります。
- `node_modules/` はリポジトリに含まれていないため、クローン後は必ず `npm install` を実行してください。
