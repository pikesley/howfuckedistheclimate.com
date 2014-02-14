require 'sinatra/base'
require 'rack-google-analytics'

class HowFuckedIsTheClimate < Sinatra::Base
  use Rack::GoogleAnalytics, :tracker => 'UA-28810060-1'

  LOCALS = {
      css:               'http://bootswatch.com/readable/bootstrap.min.css',
      title:             'How fucked is the climate?',
      additional_styles: ['../css/styles.css']
  }

  get '/' do
    haml :index, :locals => LOCALS
  end

  get '/lawson' do
    haml :lawson, :locals => LOCALS
  end

  get '/not-lawson' do
    haml :notlawson, :locals => LOCALS
  end
  # start the server if ruby file executed directly
  run! if app_file == $0
end
