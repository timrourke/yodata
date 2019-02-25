pipeline {
	agent {
		docker { image 'trourke/php-hot-lunch:latest' }
	}
	stages {
		stage('Composer Install') {
			steps {
				sh 'composer install'
			}
		}
		parallel {
			stage('Lint') {
				steps {
					sh 'composer lint'
				}
			}
			stage('Test') {
				steps {
					sh 'composer test'
				}
			}
			stage('Static Analysis') {
				steps {
					sh 'composer phpstan'
				}
			}
		}
	}
}

