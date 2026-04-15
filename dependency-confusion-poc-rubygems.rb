# These gems should NOT exist on rubygems.org
# Attacker can publish malicious versions

# VULNERABLE: Internal gems (not on public RubyGems)
require 'internal_auth_service'
require 'company_payment_processor'
require 'private_data_migration'
require 'internal_api_client'
require 'secret_key_manager'

# Legitimate gems (exist on RubyGems)
require 'rails'
require 'devise'

class ApplicationController
  def initialize
    auth = InternalAuthService.authenticate
    payment = CompanyPaymentProcessor.charge(100)
    migration = PrivateDataMigration.migrate
    api = InternalApiClient.get_data
    
    puts "All internal services initialized"
  end
end
