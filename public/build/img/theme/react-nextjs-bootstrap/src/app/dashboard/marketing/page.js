import { Row, Col } from "react-bootstrap";
import AdSpend from "@/components/Dashboard/Marketing/AdSpend";
import ClickThroughRate from "@/components/Dashboard/Marketing/ClickThroughRate";
import CostPerClick from "@/components/Dashboard/Marketing/CostPerClick";
import CostPerThousand from "@/components/Dashboard/Marketing/CostPerThousand";
import PerformanceOverview from "@/components/Dashboard/Marketing/PerformanceOverview";
import MobileApp from "@/components/Dashboard/Marketing/MobileApp";
import Highlights from "@/components/Dashboard/Marketing/Highlights";
import Channels from "@/components/Dashboard/Marketing/Channels";
import ExternalLinks from "@/components/Dashboard/Marketing/ExternalLinks";
import InstagramCampaigns from "@/components/Dashboard/Marketing/InstagramCampaigns";
import NewMarketingTool from "@/components/Dashboard/Marketing/NewMarketingTool";
import InstagramSubscriber from "@/components/Dashboard/Marketing/InstagramSubscriber";
import Campaigns from "@/components/Dashboard/Marketing/Campaigns";

export default function Page() {
  return (
    <>
      <Row>
        <Col xs={12} sm={6} md={6} lg={6} xxl={3}>
          <AdSpend />
        </Col>

        <Col xs={12} sm={6} md={6} lg={6} xxl={3}>
          <CostPerThousand />
        </Col>

        <Col xs={12} sm={6} md={6} lg={6} xxl={3}>
          <CostPerClick />
        </Col>

        <Col xs={12} sm={6} md={6} lg={6} xxl={3}>
          <ClickThroughRate />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={8} xl={8}>
          <PerformanceOverview />
        </Col>

        <Col xs={12} sm={12} md={12} lg={4} xl={4}>
          <MobileApp />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={4}>
          <Highlights />

          <Channels />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={8}>
          <Campaigns />

          <Row>
            <Col xs={12} sm={12} md={12} lg={6} xl={6}>
              <ExternalLinks />
            </Col>

            <Col xs={12} sm={12} md={12} lg={6} xl={6}>
              <InstagramCampaigns />
            </Col>
          </Row>
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={4} xl={4} xxl={3}>
          <NewMarketingTool />
        </Col>

        <Col xs={12} sm={12} md={12} lg={8} xl={8} xxl={9}>
          <InstagramSubscriber />
        </Col>
      </Row>
    </>
  );
}
