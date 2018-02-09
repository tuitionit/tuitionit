pipeline {
    agent any
    stages {
        stage('build') {
            steps {
                sh 'php --version'
                sh 'pwd'
                sh './vendor/bin/phpunit'
            }
        }
    }
}
