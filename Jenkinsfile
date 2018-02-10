pipeline {
    agent any
    stages {
        stage('env_check') {
            steps {
                sh 'php --version'
            }
        }

        stage('config') {
            steps {
                configFileProvider([configFile(fileId: 'tuitionix-test-env', variable: 'TUITIONIX_ENV')]) {
                    // new File('./.env') << new File($TUITIONIX_ENV)
                    sh 'cp $TUITIONIX_ENV ./.env'
                }
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
