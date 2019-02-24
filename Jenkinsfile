pipeline {
	agent {
		docker { image 'trourke/php-hot-lunch:latest' }
	}
	stages {
		stage('Test') {
			steps {
				sh 'composer install'
				sh 'composer test'
			}
		}
	}
}

