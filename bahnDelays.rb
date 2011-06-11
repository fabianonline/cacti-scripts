#!/usr/bin/ruby
require 'rubygems'
require 'hpricot'
require 'open-uri'

station = ARGV[0]
debug = false

uri = "http://reiseauskunft.bahn.de/bin/bhftafel.exe/dn?ld=96164&country=DEU&rt=1&input=#{station}&boardType=dep&time=actual&productsFilter=11111&start=yes"
doc = Hpricot(open(uri))
puts doc.inspect if debug
delays = (doc / "td.ris span span").inject(0) do |sum,elm|
    print "elm: #{elm.to_s} " if debug
    match = elm.inner_text.to_s.match(/(\d+) Minuten/)
    print "match: #{match.inspect} " if debug
    sum += match[1].to_i unless match.nil?
    puts "sum: #{sum}" if debug
    sum
end

puts " " if debug

cancelled = (doc / "td.ris span").inject(0) do |sum,elm|
    print "elm: #{elm.to_s} " if debug
    match = elm.inner_text.to_s.match(/Zug f.+llt aus/)
    print "match: #{match.inspect} " if debug
    sum+=1 unless match.nil?
    puts "sum: #{sum}" if debug
    sum
end

print "delay:#{delays} cancelled:#{cancelled}"
