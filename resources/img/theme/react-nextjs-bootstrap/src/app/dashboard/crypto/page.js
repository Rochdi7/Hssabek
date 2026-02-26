import { Row, Col } from "react-bootstrap";
import CryptocurrencyWatchlist from "@/components/Dashboard/Crypto/CryptocurrencyWatchlist";
import MarketPriceStatistics from "@/components/Dashboard/Crypto/MarketPriceStatistics";
import Exchange from "@/components/Dashboard/Crypto/Exchange";
import TransactionHistory from "@/components/Dashboard/Crypto/TransactionHistory";
import Portfolio from "@/components/Dashboard/Crypto/Portfolio";
import CryptoRankings from "@/components/Dashboard/Crypto/CryptoRankings";

export default function Page() {
  return (
    <>
      <div className="border-0 p-4 pb-0 bg-white rounded-3 mb-4 without-card">
        <CryptocurrencyWatchlist />

        <Row>
          <Col xs={12} sm={12} lg={8} xl={8}>
            <MarketPriceStatistics />
          </Col>

          <Col xs={12} sm={12} lg={4} xl={4}>
            <Exchange />
          </Col>
        </Row>
      </div>

      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={7}>
          <TransactionHistory />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={5}>
          <Portfolio />
        </Col>
      </Row>

      <CryptoRankings />
    </>
  );
}
