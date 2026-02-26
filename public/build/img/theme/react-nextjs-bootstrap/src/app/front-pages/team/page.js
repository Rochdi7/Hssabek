import Navbar from "@/components/FrontPages/Common/Navbar";
import OurTeamSlider from "@/components/FrontPages/Common/OurTeamSlider";
import Cta from "@/components/FrontPages/Common/Cta";
import Footer from "@/components/FrontPages/Common/Footer";
import PageBanner from "@/components/FrontPages/Common/PageBanner";

export default function Home() {
  return (
    <>
      <div className="fp-wrapper">

        <Navbar />

        <PageBanner pageTitle="Our Team" />

        <div className="pt-150">
          <OurTeamSlider />
        </div>
 
        <Cta />

        <Footer />

      </div>
    </>
  );
}
