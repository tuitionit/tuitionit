pipeline {
    agent any
    stages {
        stage('build') {
            steps {
                sh 'php --version'
                echo pwd()
                sh "${pwd()}/vendor/bin/phpunit"
            }
        }
    }
}
