# Gemfile would have: rails, devise, puma, pg, redis, unused-gem, another-unused-gem
require 'rails'
require 'devise'
require 'puma'
# require 'pg'  # Commented - NOT USED
# require 'redis'  # NOT USED

class Application
  def initialize
    puts "Rails version: #{Rails.version}"
    puts "Devise version: #{Devise::VERSION}"
    puts "Puma version: #{Puma::Const::PUMA_VERSION}"
  end
  
  def status
    { status: 'running', environment: 'development' }
  end
end

app = Application.new
app.status
