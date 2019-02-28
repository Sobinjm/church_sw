var convuni;
function startText(english, tamil) {

convuni = english.value;

convuni = convuni.replace(/njau/g, "ஞௌ");
convuni = convuni.replace(/njai/g, "ஞை");
convuni = convuni.replace(/njee/g, "ஞே");
convuni = convuni.replace(/njoo/g, "ஞோ");
convuni = convuni.replace(/njaa/g, "ஞா");
convuni = convuni.replace(/njuu/g, "ஞூ");
convuni = convuni.replace(/njii/g, "ஞீ");
convuni = convuni.replace(/nja/g, "ஞ");
convuni = convuni.replace(/nji/g, "ஞி");
convuni = convuni.replace(/njI/g, "ஞீ");
convuni = convuni.replace(/njA/g, "ஞா");
convuni = convuni.replace(/nje/g, "ஞெ");
convuni = convuni.replace(/njE/g, "ஞே");
convuni = convuni.replace(/njo/g, "ஞொ");
convuni = convuni.replace(/njO/g, "ஞோ");
convuni = convuni.replace(/nju/g, "ஞு");
convuni = convuni.replace(/njU/g, "ஞூ");

convuni = convuni.replace(/nj/g, "ஞ்");

convuni = convuni.replace(/ngau/g, "ஙௌ");
convuni = convuni.replace(/ngai/g, "ஙை");
convuni = convuni.replace(/ngee/g, "ஙே");
convuni = convuni.replace(/ngoo/g, "ஙோ");
convuni = convuni.replace(/ngaa/g, "ஙா");
convuni = convuni.replace(/nguu/g, "ஙூ");
convuni = convuni.replace(/ngii/g, "ஙீ");
convuni = convuni.replace(/nga/g, "ங");
convuni = convuni.replace(/ngi/g, "ஙி");
convuni = convuni.replace(/ngI/g, "ஙீ");
convuni = convuni.replace(/ngA/g, "ஙா");
convuni = convuni.replace(/nge/g, "ஙெ");
convuni = convuni.replace(/ngE/g, "ஙே");
convuni = convuni.replace(/ngo/g, "ஙொ");
convuni = convuni.replace(/ngO/g, "ஙோ");
convuni = convuni.replace(/ngu/g, "ஙு");
convuni = convuni.replace(/ngU/g, "ஙூ");

convuni = convuni.replace(/ng/g, "ங்");

convuni = convuni.replace(/shau/g, "ஷௌ");
convuni = convuni.replace(/shai/g, "ஷை");
convuni = convuni.replace(/shee/g, "ஷே");
convuni = convuni.replace(/shoo/g, "ஷோ");
convuni = convuni.replace(/shaa/g, "ஷா");
convuni = convuni.replace(/shuu/g, "ஷூ");
convuni = convuni.replace(/shii/g, "ஷீ");
convuni = convuni.replace(/sha/g, "ஷ");
convuni = convuni.replace(/shi/g, "ஷி");
convuni = convuni.replace(/shI/g, "ஷீ");
convuni = convuni.replace(/shA/g, "ஷா");
convuni = convuni.replace(/she/g, "ஷெ");
convuni = convuni.replace(/shE/g, "ஷே");
convuni = convuni.replace(/sho/g, "ஷொ");
convuni = convuni.replace(/shO/g, "ஷோ");
convuni = convuni.replace(/shu/g, "ஷு");
convuni = convuni.replace(/shU/g, "ஷூ");

convuni = convuni.replace(/sh/g, "ஷ்");

convuni = convuni.replace(/ nau/g, " நௌ");
convuni = convuni.replace(/ nai/g, " நை");
convuni = convuni.replace(/ nee/g, " நே");
convuni = convuni.replace(/ noo/g, " நோ");
convuni = convuni.replace(/ naa/g, " நா");
convuni = convuni.replace(/ nuu/g, " நூ");
convuni = convuni.replace(/ nii/g, " நீ");
convuni = convuni.replace(/ na/g, " ந");
convuni = convuni.replace(/ ni/g, " நி");
convuni = convuni.replace(/ nI/g, " நீ");
convuni = convuni.replace(/ nA/g, " நா");
convuni = convuni.replace(/ ne/g, " நெ");
convuni = convuni.replace(/ nE/g, " நே");
convuni = convuni.replace(/ no/g, " நொ");
convuni = convuni.replace(/ nO/g, " நோ");
convuni = convuni.replace(/ nu/g, " நு");
convuni = convuni.replace(/ nU/g, " நூ");

convuni = convuni.replace(/ nth/g, " ந்");

convuni = convuni.replace(/-nau/g, "நௌ");
convuni = convuni.replace(/-nai/g, "நை");
convuni = convuni.replace(/-nee/g, "நே");
convuni = convuni.replace(/-noo/g, "நோ");
convuni = convuni.replace(/-naa/g, "நா");
convuni = convuni.replace(/-nuu/g, "நூ");
convuni = convuni.replace(/-nii/g, "நீ");
convuni = convuni.replace(/-na/g, "ந");
convuni = convuni.replace(/-ni/g, "நி");
convuni = convuni.replace(/-nI/g, "நீ");
convuni = convuni.replace(/-nA/g, "நா");
convuni = convuni.replace(/-ne/g, "நெ");
convuni = convuni.replace(/-nE/g, "நே");
convuni = convuni.replace(/-no/g, "நொ");
convuni = convuni.replace(/-nO/g, "நோ");
convuni = convuni.replace(/-nu/g, "நு");
convuni = convuni.replace(/-nU/g, "நூ");

convuni = convuni.replace(/n-au/g, "நௌ");
convuni = convuni.replace(/n-ai/g, "நை");
convuni = convuni.replace(/n-ee/g, "நே");
convuni = convuni.replace(/n-oo/g, "நோ");
convuni = convuni.replace(/n-aa/g, "நா");
convuni = convuni.replace(/n-uu/g, "நூ");
convuni = convuni.replace(/n-ii/g, "நீ");
convuni = convuni.replace(/n-a/g, "ந");
convuni = convuni.replace(/n-i/g, "நி");
convuni = convuni.replace(/n-I/g, "நீ");
convuni = convuni.replace(/n-A/g, "நா");
convuni = convuni.replace(/n-e/g, "நெ");
convuni = convuni.replace(/n-E/g, "நே");
convuni = convuni.replace(/n-o/g, "நொ");
convuni = convuni.replace(/n-O/g, "நோ");
convuni = convuni.replace(/n-u/g, "நு");
convuni = convuni.replace(/n-U/g, "நூ");

convuni = convuni.replace(/wau/g, "நௌ");
convuni = convuni.replace(/wai/g, "நை");
convuni = convuni.replace(/wee/g, "நே");
convuni = convuni.replace(/woo/g, "நோ");
convuni = convuni.replace(/waa/g, "நா");
convuni = convuni.replace(/wuu/g, "நூ");
convuni = convuni.replace(/wii/g, "நீ");
convuni = convuni.replace(/wa/g, "ந");
convuni = convuni.replace(/wi/g, "நி");
convuni = convuni.replace(/wI/g, "நீ");
convuni = convuni.replace(/wA/g, "நா");
convuni = convuni.replace(/we/g, "நெ");
convuni = convuni.replace(/wE/g, "நே");
convuni = convuni.replace(/wo/g, "நொ");
convuni = convuni.replace(/wO/g, "நோ");
convuni = convuni.replace(/wu/g, "நு");
convuni = convuni.replace(/wU/g, "நூ");

convuni = convuni.replace(/ n/g, " ந்");
convuni = convuni.replace(/n-/g, "ந்");
convuni = convuni.replace(/-n/g, "ந்");
convuni = convuni.replace(/w/g, "ந்");

convuni = convuni.replace(/nthau/g, "ந்தௌ");
convuni = convuni.replace(/nthai/g, "ந்தை");
convuni = convuni.replace(/nthee/g, "ந்தே");
convuni = convuni.replace(/nthoo/g, "ந்தோ");
convuni = convuni.replace(/nthaa/g, "ந்தா");
convuni = convuni.replace(/nthuu/g, "ந்தூ");
convuni = convuni.replace(/nthii/g, "ந்தீ");
convuni = convuni.replace(/ntha/g, "ந்த");
convuni = convuni.replace(/nthi/g, "ந்தி");
convuni = convuni.replace(/nthI/g, "ந்தீ");
convuni = convuni.replace(/nthA/g, "ந்தா");
convuni = convuni.replace(/nthe/g, "ந்தெ");
convuni = convuni.replace(/nthE/g, "ந்தே");
convuni = convuni.replace(/ntho/g, "ந்தொ");
convuni = convuni.replace(/nthO/g, "ந்தோ");
convuni = convuni.replace(/nthu/g, "ந்து");
convuni = convuni.replace(/nthU/g, "ந்தூ");
convuni = convuni.replace(/nth/g, "ந்");

convuni = convuni.replace(/dhau/g, "தௌ");
convuni = convuni.replace(/dhai/g, "தை");
convuni = convuni.replace(/dhee/g, "தே");
convuni = convuni.replace(/dhoo/g, "தோ");
convuni = convuni.replace(/dhaa/g, "தா");
convuni = convuni.replace(/dhuu/g, "தூ");
convuni = convuni.replace(/dhii/g, "தீ");
convuni = convuni.replace(/dha/g, "த");
convuni = convuni.replace(/dhi/g, "தி");
convuni = convuni.replace(/dhI/g, "தீ");
convuni = convuni.replace(/dhA/g, "தா");
convuni = convuni.replace(/dhe/g, "தெ");
convuni = convuni.replace(/dhE/g, "தே");
convuni = convuni.replace(/dho/g, "தொ");
convuni = convuni.replace(/dhO/g, "தோ");
convuni = convuni.replace(/dhu/g, "து");
convuni = convuni.replace(/dhU/g, "தூ");

convuni = convuni.replace(/dh/g, "த்");

convuni = convuni.replace(/chau/g, "சௌ");
convuni = convuni.replace(/chai/g, "சை");
convuni = convuni.replace(/chee/g, "சே");
convuni = convuni.replace(/choo/g, "சோ");
convuni = convuni.replace(/chaa/g, "சா");
convuni = convuni.replace(/chuu/g, "சூ");
convuni = convuni.replace(/chii/g, "சீ");
convuni = convuni.replace(/cha/g, "ச");
convuni = convuni.replace(/chi/g, "சி");
convuni = convuni.replace(/chI/g, "சீ");
convuni = convuni.replace(/chA/g, "சா");
convuni = convuni.replace(/che/g, "செ");
convuni = convuni.replace(/chE/g, "சே");
convuni = convuni.replace(/cho/g, "சொ");
convuni = convuni.replace(/chO/g, "சோ");
convuni = convuni.replace(/chu/g, "சு");
convuni = convuni.replace(/chU/g, "சூ");

convuni = convuni.replace(/ch/g, "ச்");

convuni = convuni.replace(/zhau/g, "ழௌ");
convuni = convuni.replace(/zhai/g, "ழை");
convuni = convuni.replace(/zhee/g, "ழே");
convuni = convuni.replace(/zhoo/g, "ழோ");
convuni = convuni.replace(/zhaa/g, "ழா");
convuni = convuni.replace(/zhuu/g, "ழூ");
convuni = convuni.replace(/zhii/g, "ழீ");
convuni = convuni.replace(/zha/g, "ழ");
convuni = convuni.replace(/zhi/g, "ழி");
convuni = convuni.replace(/zhI/g, "ழீ");
convuni = convuni.replace(/zhA/g, "ழா");
convuni = convuni.replace(/zhe/g, "ழெ");
convuni = convuni.replace(/zhE/g, "ழே");
convuni = convuni.replace(/zho/g, "ழொ");
convuni = convuni.replace(/zhO/g, "ழோ");
convuni = convuni.replace(/zhu/g, "ழு");
convuni = convuni.replace(/zhU/g, "ழூ");

convuni = convuni.replace(/zh/g, "ழ்");
convuni = convuni.replace(/zau/g, "ழௌ");
convuni = convuni.replace(/zai/g, "ழை");
convuni = convuni.replace(/zee/g, "ழே");
convuni = convuni.replace(/zoo/g, "ழோ");
convuni = convuni.replace(/zaa/g, "ழா");
convuni = convuni.replace(/zuu/g, "ழூ");
convuni = convuni.replace(/zii/g, "ழீ");
convuni = convuni.replace(/za/g, "ழ");
convuni = convuni.replace(/zi/g, "ழி");
convuni = convuni.replace(/zI/g, "ழீ");
convuni = convuni.replace(/zA/g, "ழா");
convuni = convuni.replace(/ze/g, "ழெ");
convuni = convuni.replace(/zE/g, "ழே");
convuni = convuni.replace(/zo/g, "ழொ");
convuni = convuni.replace(/zO/g, "ழோ");
convuni = convuni.replace(/zu/g, "ழு");
convuni = convuni.replace(/zU/g, "ழூ");

convuni = convuni.replace(/z/g, "ழ்");

convuni = convuni.replace(/jau/g, "ஜௌ");
convuni = convuni.replace(/jai/g, "ஜை");
convuni = convuni.replace(/jee/g, "ஜே");
convuni = convuni.replace(/joo/g, "ஜோ");
convuni = convuni.replace(/jaa/g, "ஜா");
convuni = convuni.replace(/juu/g, "ஜூ");
convuni = convuni.replace(/jii/g, "ஜீ");
convuni = convuni.replace(/ja/g, "ஜ");
convuni = convuni.replace(/ji/g, "ஜி");
convuni = convuni.replace(/jI/g, "ஜீ");
convuni = convuni.replace(/jA/g, "ஜா");
convuni = convuni.replace(/je/g, "ஜெ");
convuni = convuni.replace(/jE/g, "ஜே");
convuni = convuni.replace(/jo/g, "ஜொ");
convuni = convuni.replace(/jO/g, "ஜோ");
convuni = convuni.replace(/ju/g, "ஜு");
convuni = convuni.replace(/jU/g, "ஜூ");

convuni = convuni.replace(/j/g, "ஜ்");

convuni = convuni.replace(/thau/g, "தௌ");
convuni = convuni.replace(/thai/g, "தை");
convuni = convuni.replace(/thee/g, "தே");
convuni = convuni.replace(/thoo/g, "தோ");
convuni = convuni.replace(/thaa/g, "தா");
convuni = convuni.replace(/thuu/g, "தூ");
convuni = convuni.replace(/thii/g, "தீ");
convuni = convuni.replace(/tha/g, "த");
convuni = convuni.replace(/thi/g, "தி");
convuni = convuni.replace(/thI/g, "தீ");
convuni = convuni.replace(/thA/g, "தா");
convuni = convuni.replace(/the/g, "தெ");
convuni = convuni.replace(/thE/g, "தே");
convuni = convuni.replace(/tho/g, "தொ");
convuni = convuni.replace(/thO/g, "தோ");
convuni = convuni.replace(/thu/g, "து");
convuni = convuni.replace(/thU/g, "தூ");

convuni = convuni.replace(/th/g, "த்");

convuni = convuni.replace(/-hau/g, "ஹௌ");
convuni = convuni.replace(/-hai/g, "ஹை");
convuni = convuni.replace(/-hee/g, "ஹே");
convuni = convuni.replace(/-hoo/g, "ஹோ");
convuni = convuni.replace(/-haa/g, "ஹா");
convuni = convuni.replace(/-huu/g, "ஹூ");
convuni = convuni.replace(/-hii/g, "ஹீ");
convuni = convuni.replace(/-ha/g, "ஹ");
convuni = convuni.replace(/-hi/g, "ஹி");
convuni = convuni.replace(/-hI/g, "ஹீ");
convuni = convuni.replace(/-hA/g, "ஹா");
convuni = convuni.replace(/-he/g, "ஹெ");
convuni = convuni.replace(/-hE/g, "ஹே");
convuni = convuni.replace(/-ho/g, "ஹொ");
convuni = convuni.replace(/-hO/g, "ஹோ");
convuni = convuni.replace(/-hu/g, "ஹு");
convuni = convuni.replace(/-hU/g, "ஹூ");

convuni = convuni.replace(/-h/g, "ஹ்");

convuni = convuni.replace(/hau/g, "ஹௌ");
convuni = convuni.replace(/hai/g, "ஹை");
convuni = convuni.replace(/hee/g, "ஹே");
convuni = convuni.replace(/hoo/g, "ஹோ");
convuni = convuni.replace(/haa/g, "ஹா");
convuni = convuni.replace(/huu/g, "ஹூ");
convuni = convuni.replace(/hii/g, "ஹீ");
convuni = convuni.replace(/ha/g, "ஹ");
convuni = convuni.replace(/hi/g, "ஹி");
convuni = convuni.replace(/hI/g, "ஹீ");
convuni = convuni.replace(/hA/g, "ஹா");
convuni = convuni.replace(/he/g, "ஹெ");
convuni = convuni.replace(/hE/g, "ஹே");
convuni = convuni.replace(/ho/g, "ஹொ");
convuni = convuni.replace(/hO/g, "ஹோ");
convuni = convuni.replace(/hu/g, "ஹு");
convuni = convuni.replace(/hU/g, "ஹூ");

convuni = convuni.replace(/h/g, "ஹ்");

convuni = convuni.replace(/kau/g, "கௌ");
convuni = convuni.replace(/kai/g, "கை");
convuni = convuni.replace(/kee/g, "கே");
convuni = convuni.replace(/koo/g, "கோ");
convuni = convuni.replace(/kaa/g, "கா");
convuni = convuni.replace(/kuu/g, "கூ");
convuni = convuni.replace(/kii/g, "கீ");
convuni = convuni.replace(/ka/g, "க");
convuni = convuni.replace(/ki/g, "கி");
convuni = convuni.replace(/kI/g, "கீ");
convuni = convuni.replace(/kA/g, "கா");
convuni = convuni.replace(/ke/g, "கெ");
convuni = convuni.replace(/kE/g, "கே");
convuni = convuni.replace(/ko/g, "கொ");
convuni = convuni.replace(/kO/g, "கோ");
convuni = convuni.replace(/ku/g, "கு");
convuni = convuni.replace(/kU/g, "கூ");

convuni = convuni.replace(/k/g, "க்");

convuni = convuni.replace(/sri/g, "Srii");
convuni = convuni.replace(/sr/g, "Srii");

convuni = convuni.replace(/-sau/g, "ஸௌ");
convuni = convuni.replace(/-sai/g, "ஸை");
convuni = convuni.replace(/-see/g, "ஸே");
convuni = convuni.replace(/-soo/g, "ஸோ");
convuni = convuni.replace(/-saa/g, "ஸா");
convuni = convuni.replace(/-suu/g, "ஸூ");
convuni = convuni.replace(/-sii/g, "ஸீ");
convuni = convuni.replace(/-sa/g, "ஸ");
convuni = convuni.replace(/-si/g, "ஸி");
convuni = convuni.replace(/-sI/g, "ஸீ");
convuni = convuni.replace(/-sA/g, "ஸா");
convuni = convuni.replace(/-se/g, "ஸெ");
convuni = convuni.replace(/-sE/g, "ஸே");
convuni = convuni.replace(/-so/g, "ஸொ");
convuni = convuni.replace(/-sO/g, "ஸோ");
convuni = convuni.replace(/-su/g, "ஸு");
convuni = convuni.replace(/-sU/g, "ஸூ");

convuni = convuni.replace(/-s/g, "ஸ்");

convuni = convuni.replace(/Sau/g, "ஸௌ");
convuni = convuni.replace(/Sai/g, "ஸை");
convuni = convuni.replace(/See/g, "ஸே");
convuni = convuni.replace(/Soo/g, "ஸோ");
convuni = convuni.replace(/Saa/g, "ஸா");
convuni = convuni.replace(/Suu/g, "ஸூ");
convuni = convuni.replace(/Sii/g, "ஸீ");
convuni = convuni.replace(/Sa/g, "ஸ");
convuni = convuni.replace(/Si/g, "ஸி");
convuni = convuni.replace(/SI/g, "ஸீ");
convuni = convuni.replace(/SA/g, "ஸா");
convuni = convuni.replace(/Se/g, "ஸெ");
convuni = convuni.replace(/SE/g, "ஸே");
convuni = convuni.replace(/So/g, "ஸொ");
convuni = convuni.replace(/SO/g, "ஸோ");
convuni = convuni.replace(/Su/g, "ஸு");
convuni = convuni.replace(/SU/g, "ஸூ");

convuni = convuni.replace(/S/g, "ஸ்");

convuni = convuni.replace(/rau/g, "ரௌ");
convuni = convuni.replace(/rai/g, "ரை");
convuni = convuni.replace(/ree/g, "ரே");
convuni = convuni.replace(/roo/g, "ரோ");
convuni = convuni.replace(/raa/g, "ரா");
convuni = convuni.replace(/ruu/g, "ரூ");
convuni = convuni.replace(/rii/g, "ரீ");
convuni = convuni.replace(/ra/g, "ர");
convuni = convuni.replace(/ri/g, "ரி");
convuni = convuni.replace(/rI/g, "ரீ");
convuni = convuni.replace(/rA/g, "ரா");
convuni = convuni.replace(/re/g, "ரெ");
convuni = convuni.replace(/rE/g, "ரே");
convuni = convuni.replace(/ro/g, "ரொ");
convuni = convuni.replace(/rO/g, "ரோ");
convuni = convuni.replace(/ru/g, "ரு");
convuni = convuni.replace(/rU/g, "ரூ");

convuni = convuni.replace(/r/g, "ர்");

convuni = convuni.replace(/Rau/g, "றௌ");
convuni = convuni.replace(/Rai/g, "றை");
convuni = convuni.replace(/Ree/g, "றே");
convuni = convuni.replace(/Roo/g, "றோ");
convuni = convuni.replace(/Raa/g, "றா");
convuni = convuni.replace(/Ruu/g, "றூ");
convuni = convuni.replace(/Rii/g, "றீ");
convuni = convuni.replace(/Ra/g, "ற");
convuni = convuni.replace(/Ri/g, "றி");
convuni = convuni.replace(/RI/g, "றீ");
convuni = convuni.replace(/RA/g, "றா");
convuni = convuni.replace(/Re/g, "றெ");
convuni = convuni.replace(/RE/g, "றே");
convuni = convuni.replace(/Ro/g, "றொ");
convuni = convuni.replace(/RO/g, "றோ");
convuni = convuni.replace(/Ru/g, "று");
convuni = convuni.replace(/RU/g, "றூ");

convuni = convuni.replace(/R/g, "ற்");

convuni = convuni.replace(/tau/g, "டௌ");
convuni = convuni.replace(/tai/g, "டை");
convuni = convuni.replace(/tee/g, "டே");
convuni = convuni.replace(/too/g, "டோ");
convuni = convuni.replace(/taa/g, "டா");
convuni = convuni.replace(/tuu/g, "டூ");
convuni = convuni.replace(/tii/g, "டீ");
convuni = convuni.replace(/ta/g, "ட");
convuni = convuni.replace(/ti/g, "டி");
convuni = convuni.replace(/tI/g, "டீ");
convuni = convuni.replace(/tA/g, "டா");
convuni = convuni.replace(/te/g, "டெ");
convuni = convuni.replace(/tE/g, "டே");
convuni = convuni.replace(/to/g, "டொ");
convuni = convuni.replace(/tO/g, "டோ");
convuni = convuni.replace(/tu/g, "டு");
convuni = convuni.replace(/tU/g, "டூ");

convuni = convuni.replace(/t/g, "ட்");

convuni = convuni.replace(/sau/g, "சௌ");
convuni = convuni.replace(/sai/g, "சை");
convuni = convuni.replace(/see/g, "சே");
convuni = convuni.replace(/soo/g, "சோ");
convuni = convuni.replace(/saa/g, "சா");
convuni = convuni.replace(/suu/g, "சூ");
convuni = convuni.replace(/sii/g, "சீ");
convuni = convuni.replace(/sa/g, "ச");
convuni = convuni.replace(/si/g, "சி");
convuni = convuni.replace(/sI/g, "சீ");
convuni = convuni.replace(/sA/g, "சா");
convuni = convuni.replace(/se/g, "செ");
convuni = convuni.replace(/sE/g, "சே");
convuni = convuni.replace(/so/g, "சொ");
convuni = convuni.replace(/sO/g, "சோ");
convuni = convuni.replace(/su/g, "சு");
convuni = convuni.replace(/sU/g, "சூ");

convuni = convuni.replace(/s/g, "ச்");

convuni = convuni.replace(/cau/g, "சௌ");
convuni = convuni.replace(/cai/g, "சை");
convuni = convuni.replace(/cee/g, "சே");
convuni = convuni.replace(/coo/g, "சோ");
convuni = convuni.replace(/caa/g, "சா");
convuni = convuni.replace(/cuu/g, "சூ");
convuni = convuni.replace(/cii/g, "சீ");
convuni = convuni.replace(/ca/g, "ச");
convuni = convuni.replace(/ci/g, "சி");
convuni = convuni.replace(/cI/g, "சீ");
convuni = convuni.replace(/cA/g, "சா");
convuni = convuni.replace(/ce/g, "செ");
convuni = convuni.replace(/cE/g, "சே");
convuni = convuni.replace(/co/g, "சொ");
convuni = convuni.replace(/cO/g, "சோ");
convuni = convuni.replace(/cu/g, "சு");
convuni = convuni.replace(/cU/g, "சூ");

convuni = convuni.replace(/c/g, "ச்");

convuni = convuni.replace(/pau/g, "பௌ");
convuni = convuni.replace(/pai/g, "பை");
convuni = convuni.replace(/pee/g, "பே");
convuni = convuni.replace(/poo/g, "போ");
convuni = convuni.replace(/paa/g, "பா");
convuni = convuni.replace(/puu/g, "பூ");
convuni = convuni.replace(/pii/g, "பீ");
convuni = convuni.replace(/pa/g, "ப");
convuni = convuni.replace(/pi/g, "பி");
convuni = convuni.replace(/pI/g, "பீ");
convuni = convuni.replace(/pA/g, "பா");
convuni = convuni.replace(/pe/g, "பெ");
convuni = convuni.replace(/pE/g, "பே");
convuni = convuni.replace(/po/g, "பொ");
convuni = convuni.replace(/pO/g, "போ");
convuni = convuni.replace(/pu/g, "பு");
convuni = convuni.replace(/pU/g, "பூ");

convuni = convuni.replace(/p/g, "ப்");

convuni = convuni.replace(/bau/g, "பௌ");
convuni = convuni.replace(/bai/g, "பை");
convuni = convuni.replace(/bee/g, "பே");
convuni = convuni.replace(/boo/g, "போ");
convuni = convuni.replace(/baa/g, "பா");
convuni = convuni.replace(/buu/g, "பூ");
convuni = convuni.replace(/bii/g, "பீ");
convuni = convuni.replace(/ba/g, "ப");
convuni = convuni.replace(/bi/g, "பி");
convuni = convuni.replace(/bI/g, "பீ");
convuni = convuni.replace(/bA/g, "பா");
convuni = convuni.replace(/be/g, "பெ");
convuni = convuni.replace(/bE/g, "பே");
convuni = convuni.replace(/bo/g, "பொ");
convuni = convuni.replace(/bO/g, "போ");
convuni = convuni.replace(/bu/g, "பு");
convuni = convuni.replace(/bU/g, "பூ");

convuni = convuni.replace(/b/g, "ப்");
convuni = convuni.replace(/mau/g, "மௌ");
convuni = convuni.replace(/mai/g, "மை");
convuni = convuni.replace(/mee/g, "மே");
convuni = convuni.replace(/moo/g, "மோ");
convuni = convuni.replace(/maa/g, "மா");
convuni = convuni.replace(/muu/g, "மூ");
convuni = convuni.replace(/mii/g, "மீ");
convuni = convuni.replace(/ma/g, "ம");
convuni = convuni.replace(/mi/g, "மி");
convuni = convuni.replace(/mI/g, "மீ");
convuni = convuni.replace(/mA/g, "மா");
convuni = convuni.replace(/me/g, "மெ");
convuni = convuni.replace(/mE/g, "மே");
convuni = convuni.replace(/mo/g, "மொ");
convuni = convuni.replace(/mO/g, "மோ");
convuni = convuni.replace(/mu/g, "மு");
convuni = convuni.replace(/mU/g, "மூ");

convuni = convuni.replace(/m/g, "ம்");

convuni = convuni.replace(/yau/g, "யௌ");
convuni = convuni.replace(/yai/g, "யை");
convuni = convuni.replace(/yee/g, "யே");
convuni = convuni.replace(/yoo/g, "யோ");
convuni = convuni.replace(/yaa/g, "யா");
convuni = convuni.replace(/yuu/g, "யூ");
convuni = convuni.replace(/yii/g, "யீ");
convuni = convuni.replace(/ya/g, "ய");
convuni = convuni.replace(/yi/g, "யி");
convuni = convuni.replace(/yI/g, "யீ");
convuni = convuni.replace(/yA/g, "யா");
convuni = convuni.replace(/ye/g, "யெ");
convuni = convuni.replace(/yE/g, "யே");
convuni = convuni.replace(/yo/g, "யொ");
convuni = convuni.replace(/yO/g, "யோ");
convuni = convuni.replace(/yu/g, "யு");
convuni = convuni.replace(/yU/g, "யூ");

convuni = convuni.replace(/y/g, "ய்");

convuni = convuni.replace(/dau/g, "டௌ");
convuni = convuni.replace(/dai/g, "டை");
convuni = convuni.replace(/dee/g, "டே");
convuni = convuni.replace(/doo/g, "டோ");
convuni = convuni.replace(/daa/g, "டா");
convuni = convuni.replace(/duu/g, "டூ");
convuni = convuni.replace(/dii/g, "டீ");
convuni = convuni.replace(/da/g, "ட");
convuni = convuni.replace(/di/g, "டி");
convuni = convuni.replace(/dI/g, "டீ");
convuni = convuni.replace(/dA/g, "டா");
convuni = convuni.replace(/de/g, "டெ");
convuni = convuni.replace(/dE/g, "டே");
convuni = convuni.replace(/do/g, "டொ");
convuni = convuni.replace(/dO/g, "டோ");
convuni = convuni.replace(/du/g, "டு");
convuni = convuni.replace(/dU/g, "டூ");

convuni = convuni.replace(/d/g, "ட்");

convuni = convuni.replace(/nau/g, "னௌ");
convuni = convuni.replace(/nai/g, "னை");
convuni = convuni.replace(/nee/g, "னே");
convuni = convuni.replace(/noo/g, "னோ");
convuni = convuni.replace(/naa/g, "னா");
convuni = convuni.replace(/nuu/g, "னூ");
convuni = convuni.replace(/nii/g, "னீ");
convuni = convuni.replace(/na/g, "ன");
convuni = convuni.replace(/ni/g, "னி");
convuni = convuni.replace(/nI/g, "னீ");
convuni = convuni.replace(/nA/g, "னா");
convuni = convuni.replace(/ne/g, "னெ");
convuni = convuni.replace(/nE/g, "னே");
convuni = convuni.replace(/no/g, "னொ");
convuni = convuni.replace(/nO/g, "னோ");
convuni = convuni.replace(/nu/g, "னு");
convuni = convuni.replace(/nU/g, "னூ");

convuni = convuni.replace(/n/g, "ன்");

convuni = convuni.replace(/Nau/g, "ணௌ");
convuni = convuni.replace(/Nai/g, "ணை");
convuni = convuni.replace(/Nee/g, "ணே");
convuni = convuni.replace(/Noo/g, "ணோ");
convuni = convuni.replace(/Naa/g, "ணா");
convuni = convuni.replace(/Nuu/g, "ணூ");
convuni = convuni.replace(/Nii/g, "ணீ");
convuni = convuni.replace(/Na/g, "ண");
convuni = convuni.replace(/Ni/g, "ணி");
convuni = convuni.replace(/NI/g, "ணீ");
convuni = convuni.replace(/NA/g, "ணா");
convuni = convuni.replace(/Ne/g, "ணெ");
convuni = convuni.replace(/NE/g, "ணே");
convuni = convuni.replace(/No/g, "ணொ");
convuni = convuni.replace(/NO/g, "ணோ");
convuni = convuni.replace(/Nu/g, "ணு");
convuni = convuni.replace(/NU/g, "ணூ");

convuni = convuni.replace(/N/g, "ண்");

convuni = convuni.replace(/lau/g, "லௌ");
convuni = convuni.replace(/lai/g, "லை");
convuni = convuni.replace(/lee/g, "லே");
convuni = convuni.replace(/loo/g, "லோ");
convuni = convuni.replace(/laa/g, "லா");
convuni = convuni.replace(/luu/g, "லூ");
convuni = convuni.replace(/lii/g, "லீ");
convuni = convuni.replace(/la/g, "ல");
convuni = convuni.replace(/li/g, "லி");
convuni = convuni.replace(/lI/g, "லீ");
convuni = convuni.replace(/lA/g, "லா");
convuni = convuni.replace(/le/g, "லெ");
convuni = convuni.replace(/lE/g, "லே");
convuni = convuni.replace(/lo/g, "லொ");
convuni = convuni.replace(/lO/g, "லோ");
convuni = convuni.replace(/lu/g, "லு");
convuni = convuni.replace(/lU/g, "லூ");

convuni = convuni.replace(/l/g, "ல்");

convuni = convuni.replace(/Lau/g, "ளௌ");
convuni = convuni.replace(/Lai/g, "ளை");
convuni = convuni.replace(/Lee/g, "ளே");
convuni = convuni.replace(/Loo/g, "ளோ");
convuni = convuni.replace(/Laa/g, "ளா");
convuni = convuni.replace(/Luu/g, "ளூ");
convuni = convuni.replace(/Lii/g, "ளீ");
convuni = convuni.replace(/La/g, "ள");
convuni = convuni.replace(/Li/g, "ளி");
convuni = convuni.replace(/LI/g, "ளீ");
convuni = convuni.replace(/LA/g, "ளா");
convuni = convuni.replace(/Le/g, "ளெ");
convuni = convuni.replace(/LE/g, "ளே");
convuni = convuni.replace(/Lo/g, "ளொ");
convuni = convuni.replace(/LO/g, "ளோ");
convuni = convuni.replace(/Lu/g, "ளு");
convuni = convuni.replace(/LU/g, "ளூ");

convuni = convuni.replace(/L/g, "ள்");

convuni = convuni.replace(/vau/g, "வௌ");
convuni = convuni.replace(/vai/g, "வை");
convuni = convuni.replace(/vee/g, "வே");
convuni = convuni.replace(/voo/g, "வோ");
convuni = convuni.replace(/vaa/g, "வா");
convuni = convuni.replace(/vuu/g, "வூ");
convuni = convuni.replace(/vii/g, "வீ");
convuni = convuni.replace(/va/g, "வ");
convuni = convuni.replace(/vi/g, "வி");
convuni = convuni.replace(/vI/g, "வீ");
convuni = convuni.replace(/vA/g, "வா");
convuni = convuni.replace(/ve/g, "வெ");
convuni = convuni.replace(/vE/g, "வே");
convuni = convuni.replace(/vo/g, "வொ");
convuni = convuni.replace(/vO/g, "வோ");
convuni = convuni.replace(/vu/g, "வு");
convuni = convuni.replace(/vU/g, "வூ");

convuni = convuni.replace(/v/g, "வ்");

convuni = convuni.replace(/gau/g, "கௌ");
convuni = convuni.replace(/gai/g, "கை");
convuni = convuni.replace(/gee/g, "கே");
convuni = convuni.replace(/goo/g, "கோ");
convuni = convuni.replace(/gaa/g, "கா");
convuni = convuni.replace(/guu/g, "கூ");
convuni = convuni.replace(/gii/g, "கீ");
convuni = convuni.replace(/ga/g, "க");
convuni = convuni.replace(/gi/g, "கி");
convuni = convuni.replace(/gI/g, "கீ");
convuni = convuni.replace(/gA/g, "கா");
convuni = convuni.replace(/ge/g, "கெ");
convuni = convuni.replace(/gE/g, "கே");
convuni = convuni.replace(/go/g, "கொ");
convuni = convuni.replace(/gO/g, "கோ");
convuni = convuni.replace(/gu/g, "கு");
convuni = convuni.replace(/gU/g, "கூ");

convuni = convuni.replace(/g/g, "க்");

convuni = convuni.replace(/au/g, "ஔ");
convuni = convuni.replace(/ai/g, "ஐ");
convuni = convuni.replace(/aa/g, "ஆ");
convuni = convuni.replace(/ee/g, "ஏ");
convuni = convuni.replace(/ii/g, "ஈ");
convuni = convuni.replace(/uu/g, "ஊ");
convuni = convuni.replace(/oo/g, "ஓ");

convuni = convuni.replace(/-1000/g, "௲");

convuni = convuni.replace(/-100/g, "௱");

convuni = convuni.replace(/-10/g, "௰");
convuni = convuni.replace(/-1/g, "௧");

convuni = convuni.replace(/-2/g, "௨");
convuni = convuni.replace(/-3/g, "௩");

convuni = convuni.replace(/-4/g, "௪");
convuni = convuni.replace(/-5/g, "௫");

convuni = convuni.replace(/-6/g, "௬");
convuni = convuni.replace(/-7/g, "௭");

convuni = convuni.replace(/-8/g, "௮");
convuni = convuni.replace(/-9/g, "௯");

convuni = convuni.replace(/i/g, "இ");
convuni = convuni.replace(/I/g, "ஈ");

convuni = convuni.replace(/a/g, "அ");

convuni = convuni.replace(/A/g, "ஆ");

convuni = convuni.replace(/e/g, "எ");
convuni = convuni.replace(/E/g, "ஏ");
convuni = convuni.replace(/i/g, "இ");
convuni = convuni.replace(/I/g, "ஈ");
convuni = convuni.replace(/u/g, "உ");
convuni = convuni.replace(/U/g, "ஊ");
convuni = convuni.replace(/o/g, "ஒ");
convuni = convuni.replace(/O/g, "ஓ");
convuni = convuni.replace(/x/g, "௯");
convuni = convuni.replace(/q/g, "ஃ");

tamil.value = convuni;
}

function toForm() {
document.unidoc.box1.focus();
}
function copyit(theField) {
var tempval=eval("document."+theField)
tempval.focus()
tempval.select()
therange=tempval.createTextRange()
therange.execCommand("Copy")
}