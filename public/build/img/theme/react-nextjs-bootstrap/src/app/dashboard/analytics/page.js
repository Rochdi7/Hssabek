import { Row, Col } from "react-bootstrap";
import AnalyticsOverview from "@/components/Dashboard/Analytics/AnalyticsOverview";
import Stats from "@/components/Dashboard/Analytics/Stats";
import RealtimeActiveUsers from "@/components/Dashboard/Analytics/RealtimeActiveUsers";
import BrowserUsedByUsers from "@/components/Dashboard/Analytics/BrowserUsedByUsers";
import DeviceSessions from "@/components/Dashboard/Analytics/DeviceSessions";
import Clicks from "@/components/Dashboard/Analytics/Clicks";
import Impressions from "@/components/Dashboard/Analytics/Impressions";
import Sessions from "@/components/Dashboard/Analytics/Sessions";
import SessionsByChannel from "@/components/Dashboard/Analytics/SessionsByChannel";
import ClicksByKeywords from "@/components/Dashboard/Analytics/ClicksByKeywords";
import TopBrowsingPagesToday from "@/components/Dashboard/Analytics/TopBrowsingPagesToday";
import UsersByCountry from "@/components/Dashboard/Analytics/UsersByCountry";

export default function Page() {
  return (
    <>
      <Row>
        <Col xs={12} sm={12} lg={8} xl={12} xxl={8}>
          <AnalyticsOverview />

          <Stats />
        </Col>

        <Col xs={12} sm={12} lg={4} xl={12} xxl={4}>
          <RealtimeActiveUsers />
        </Col>
      </Row>

      <Row>
        <Col xs={12} lg={12} xl={12} xxl={7}>
          <BrowserUsedByUsers />
        </Col>

        <Col xs={12} lg={12} xl={12} xxl={5}>
          <DeviceSessions />
        </Col>
      </Row>

      <Row className="justify-content-center">
        <Col xs={12} md={6} xl={6} xxl={4}>
          <Clicks />
        </Col>

        <Col xs={12} md={6} xl={6} xxl={4}>
          <Impressions />
        </Col>

        <Col xs={12} md={6} xl={6} xxl={4}>
          <Sessions />
        </Col>
      </Row>

      <Row>
        <Col xs={12} md={12} lg={12} xl={5}>
          <SessionsByChannel />
        </Col>

        <Col xs={12} md={12} lg={12} xl={7}>
          <ClicksByKeywords />
        </Col>
      </Row>

      <Row>
        <Col xs={12} md={12} lg={12} xl={12} xxl={8}>
          <TopBrowsingPagesToday />
        </Col>

        <Col xs={12} md={12} lg={12} xl={12} xxl={4}>
          <UsersByCountry />
        </Col>
      </Row>
    </>
  );
}
