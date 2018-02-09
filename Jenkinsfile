pipeline {
    agent any
    stages {
        stage('build') {
            steps {
                sh 'php --version'
                sh './vendor/bin/phpunit'
            }
        }
    }
}
