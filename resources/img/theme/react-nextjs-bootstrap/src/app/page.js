import ContactUs from "@/components/FrontPages/Common/ContactUs";
import KeyFeatures from "@/components/FrontPages/Common/KeyFeatures";
import Navbar from "@/components/FrontPages/Common/Navbar";
import OurTeamSlider from "@/components/FrontPages/Common/OurTeamSlider";
import Testimonials from "@/components/FrontPages/Common/Testimonials";
import Widget from "@/components/FrontPages/Common/Widget";
import FaqContent from "@/components/FrontPages/Faq/FaqContent";
import HeroBanner from "@/components/FrontPages/Home/HeroBanner";
import Cta from "@/components/FrontPages/Common/Cta";
import Footer from "@/components/FrontPages/Common/Footer";

export default function Home() {
  return (
    <>
      <div className="fp-wrapper">

        <Navbar />
  
        <HeroBanner />

        <KeyFeatures />

        <Widget />

        <Testimonials />

        <OurTeamSlider />

        <FaqContent />

        <ContactUs />

        <Cta />

        <Footer />

      </div>
    </>
  );
}
