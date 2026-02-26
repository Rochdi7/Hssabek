import { Row, Col } from "react-bootstrap";
import RevenueGrowth from "@/components/Dashboard/CRM/RevenueGrowth";
import LeadConversion from "@/components/Dashboard/CRM/LeadConversion";
import TotalOrders from "@/components/Dashboard/CRM/TotalOrders";
import AnnualProfit from "@/components/Dashboard/CRM/AnnualProfit";
import BalanceOverview from "@/components/Dashboard/CRM/BalanceOverview";
import LeadsBySource from "@/components/Dashboard/CRM/LeadsBySource";
import TopPerformer from "@/components/Dashboard/CRM/TopPerformer";
import RecentLeads from "@/components/Dashboard/CRM/RecentLeads";
import SalesReport from "@/components/Dashboard/CRM/SalesReport";
import TopProductsBySales from "@/components/Dashboard/CRM/TopProductsBySales";

export default function Page() {
  return (
    <>
      <Row>
        <Col xs={12} sm={6} lg={6} xl={6} xxl={3}>
          <RevenueGrowth />
        </Col>

        <Col xs={12} sm={6} lg={6} xl={6} xxl={3}>
          <LeadConversion />
        </Col>

        <Col xs={12} sm={6} lg={6} xl={6} xxl={3}>
          <TotalOrders />
        </Col>

        <Col xs={12} sm={6} lg={6} xl={6} xxl={3}>
          <AnnualProfit />
        </Col>
      </Row>

      <Row>
        <Col xs={12} lg={12} xl={8}>
          <BalanceOverview />
        </Col>

        <Col xs={12} lg={12} xl={4}>
          <LeadsBySource />
        </Col>
      </Row>

      <Row>
        <Col xs={12} lg={5} xl={5} xxl={4}>
          <TopPerformer />
        </Col>

        <Col xs={12} lg={7} xl={7} xxl={8}>
          <RecentLeads />
        </Col>
      </Row>

      <Row>
        <Col xs={12} lg={6} xl={7} xxl={8}>
          <SalesReport />
        </Col>

        <Col xs={12} lg={6} xl={5} xxl={4}>
          <TopProductsBySales />
        </Col>
      </Row>
    </>
  );
}
