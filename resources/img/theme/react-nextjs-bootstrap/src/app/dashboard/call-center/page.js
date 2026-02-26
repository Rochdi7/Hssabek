import CallCenterGeography from "@/components/Dashboard/CallCenter/CallCenterGeography";
import AgentsPerformanceOverview from "@/components/Dashboard/CallCenter/AgentsPerformanceOverview";
import InboundCalls from "@/components/Dashboard/CallCenter/InboundCalls";
import OutboundCalls from "@/components/Dashboard/CallCenter/OutboundCalls";
import Overview from "@/components/Dashboard/CallCenter/Overview";
import { Row, Col } from "react-bootstrap";
import AgentAvgEarnings from "@/components/Dashboard/CallCenter/AgentAvgEarnings";
import RecentCallsCard from "@/components/Dashboard/CallCenter/RecentCalls";

export default function Page() {
  return (
    <>
      <Row>
        <Col xs={12} sm={12} md={12} xxl={8}>
          <Overview />
        </Col>

        <Col xs={12} sm={12} md={12} xxl={4}>
          <InboundCalls />

          <OutboundCalls />
        </Col>
      </Row>

      <Row>
        <Col xs={12} lg={12} xl={12} xxl={6}>
          <AgentsPerformanceOverview />
        </Col>

        <Col xs={12} lg={12} xl={12} xxl={6}>
          <CallCenterGeography />
        </Col>
      </Row>

      <Row>
        <Col xs={12} lg={12} xl={12} xxl={4}>
          <AgentAvgEarnings />
        </Col>

        <Col xs={12} lg={12} xl={12} xxl={8}>
          <RecentCallsCard />
        </Col>
      </Row>
    </>
  );
}
