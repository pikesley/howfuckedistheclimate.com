#!/usr/bin/env ruby

require 'rubygems'
require 'open-uri'
require 'yaml'
require 'mysql'

y = YAML::load(File.open('../config/config.yaml'))

dbh = Mysql.real_connect("#{y['mysql']['host']}",
                         "#{y['mysql']['user']}",
                         "#{y['mysql']['pass']}",
                         "#{y['mysql']['db']}")

open(y['eighthundreds']['raw']).readlines.each do |line|
  line.strip!
  if line[0..0] == '-'
    b = line.split(' ')
    b.shift
    code = b.shift
    text = b.join(' ')
    if not text.include?('http')
      query = "INSERT INTO #{y['mysql']['table']} VALUES (#{code}, '#{text}') ON DUPLICATE KEY UPDATE text = text;"
      puts "Upserting '#{code} - #{text}'"
      dbh.query(query)
    end
  end
end
