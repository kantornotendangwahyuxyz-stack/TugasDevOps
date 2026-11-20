# Latihan DevOps - Aplikasi Git Test (ELIA KHOLIFATUS SAADAH)

Repository ini digunakan untuk latihan version control, CI/CD pipeline, kontainerisasi Docker, unit testing, dan manajemen repositori DevOps.

---

## 👥 Pengembang / Anggota Kelompok
- **Nama:** ELIA KHOLIFATUS SAADAH

---

## 🚀 Panduan Penggunaan & Menjalankan Aplikasi

### 1. Prasyarat Sistem
- Docker & Docker Compose (v2.x+)
- Node.js (v20.x+) *(opsional untuk pengujian lokal di luar Docker)*

### 2. Langkah Instalasi & Docker Compose (Tanpa Langkah Tambahan di Luar README)
1. **Clone Repositori**
   ```bash
   git clone https://github.com/kantornotendangwahyuxyz-stack/TugasDevOps.git
   cd TugasDevOps/git-test-main
   ```

2. **Salin File Environment**
   ```bash
   cp .env.example .env
   ```

3. **Jalankan Aplikasi dengan Docker Compose**
   ```bash
   docker compose up -d
   ```

4. **Akses Aplikasi**
   Buka peramban (browser) di: `http://localhost:8080`

5. **Menghentikan Container**
   ```bash
   docker compose down
   ```

---

## 🧪 Perintah Unit Testing

Pengujian unit test menggunakan standar Node.js Test Runner.

### Jalankan Unit Test:
```bash
npm test
```
*Atau secara langsung:*
```bash
node --test test/*.test.js
```

**Hasil Ekspektasi Unit Test:**
```text
✔ formatWaktu returns valid formatted time string
✔ getOutputText formats message correctly with timestamp
ℹ tests 2 | pass 2 | fail 0
```

---

## ⚙️ CI/CD Pipeline & Riwayat Perbaikan (GitLab CI / GitHub Actions)

- **Status Pipeline `main`:** 🟢 **Hijau (Passed)**
- **Bukti Pipeline Gagal yang Telah Diperbaiki:**
    - **Insiden Pipeline #104 (Gagal):** Pipeline gagal pada tahap `unit_test` karena fungsi `formatWaktu()` belum menangani input objek `Date` yang `undefined` dengan benar.
    - **Perbaikan (Fixed):** Commit `fix(script): default parameter value added for formatWaktu` telah memperbaiki logika pengujian. Pipeline berikutnya (#105) sukses dan berstatus **Hijau**.

---

## 🛡️ Proteksi Branch & Merge Request (MR / PR)

Branch `main` telah dikonfigurasi dengan aturan **Protected Branch**:
- Direct push ke `main` ditolak.
- Diperlukan minimal **1 Code Review & Approval** sebelum merge.

### Merge Request / Pull Request yang Telah Di-merge:
1. **MR/PR #1:** `feature/unit-tests-and-node-setup` -> Merged after review.
2. **MR/PR #2:** `feature/docker-compose-and-gitlab-ci` -> Merged after review.

---

## 📊 Kontribusi Commit

Pengembang memiliki minimal 5 commit atas nama sendiri:
- **ELIA KHOLIFATUS SAADAH (`kantor.not.endangwahyu.xyz@gmail.com`):** > 5 Commit (Initial web layout, Dockerfile setup, Docker compose, unit test suite, CI/CD pipeline setup, README documentation, security audit, dan tag `uts-final`).

---

## 📁 Kelengkapan File Repositori

File utama berikut wajib dan tersedia di repositori:
- `Dockerfile` (Base image: `nginx:1.27.2-alpine`)
- `.dockerignore`
- `compose.yaml` (Image tag: `git-test-app:1.0.0`)
- `.env.example`
- `.gitignore`
- `.gitlab-ci.yml`
- `README.md`
