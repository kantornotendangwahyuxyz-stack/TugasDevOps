
pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                echo 'Repository berhasil diakses oleh Jenkins!'
            }
        }

        stage('Build') {
            steps {
                echo 'Menjalankan tahap build...'
            }
        }

        stage('Test') {
            steps {
                echo 'Menjalankan tahap testing...'
            }
        }
    }

    post {
        success {
            echo 'Pipeline berhasil dijalankan!'
        }

        failure {
            echo 'Pipeline gagal dijalankan.'
        }
    }
}
