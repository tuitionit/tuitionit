pipeline {
    agent any
    stages {
        stage('env_check') {
            steps {
                sh 'php --version'
                // TODO: check if the DBs exists
            }
        }

        stage('composer_install') {
            steps {
                sh 'composer install'
            }
        }

        stage('php_lint') {
            steps {
                sh 'find . -type d \\( -path ./vendor -o -path ./node_modules \\) -prune -o -name "*.php" -print0 | xargs -0 -n1 php -l'
            }
        }

        stage('phpunit') {
            steps {
                sh 'vendor/bin/phpunit'
            }
        }
    }
}
