pipeline {
    agent any
    stages {
        stage('env_check') {
            steps {
                sh 'php --version'
            }
        }

        stage('composer_install') {
            steps {
                sh 'composer install'
            }
        }

        stage('php_lint') {
            steps {
                sh 'find . -name "*.php" -print0 | xargs -0 -n1 php -l'
            }
        }

        stage('phpunit') {
            steps {
                sh 'vendor/bin/phpunit'
            }
        }
    }
}
